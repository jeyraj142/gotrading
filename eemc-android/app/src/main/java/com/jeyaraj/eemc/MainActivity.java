package com.jeyaraj.eemc;

import android.app.*;
import android.os.Bundle;
import android.content.*;
import android.graphics.Color;
import android.graphics.Typeface;
import android.graphics.drawable.GradientDrawable;
import android.text.InputType;
import android.view.*;
import android.widget.*;
import java.util.*;

public class MainActivity extends Activity {
    final int NAVY=Color.rgb(8,63,102), BLUE=Color.rgb(17,116,215), LIGHT=Color.rgb(244,249,253), TEXT=Color.rgb(14,55,91), GREEN=Color.rgb(30,177,102), ORANGE=Color.rgb(255,131,34), RED=Color.rgb(236,78,78), PURPLE=Color.rgb(120,83,214), TEAL=Color.rgb(25,171,171), YELLOW=Color.rgb(255,190,24);
    LinearLayout page, fields, results, modeBar; ScrollView scroll; EditText[] input = new EditText[6]; String mode="Engineer"; int activeCalc=0;

    final String[] quotes={
        "Safety, precision, and power go hand in hand.",
        "Every safe circuit begins with a correct calculation.",
        "Measure twice, energize once.",
        "Reliable grids are built one verified calculation at a time.",
        "Know the current before you choose the conductor.",
        "The best troubleshooting tool is understanding the circuit.",
        "Calculate. Verify. Energize safely.",
        "Good engineering turns electrical power into reliable progress."
    };

    final String[] catNames={"Basic Electrical","AC / DC Circuits","Power System","Grid / PSS / DSS","Protection & Faults","Transformers","Motors & Drives","Cable Sizing","Earthing","Measurements","Electrician Tools","Unit Conversion"};
    final String[] catIcons={"⚡","∿","⚙","▦","🛡","▥","◉","⌁","⏚","◷","🛠","↔"};
    final int[] catColors={YELLOW,Color.rgb(42,161,226),ORANGE,TEAL,RED,PURPLE,Color.rgb(74,181,82),ORANGE,Color.rgb(151,91,34),BLUE,Color.rgb(231,58,110),Color.rgb(111,135,155)};

    final String[] names={
        "Ohm's Law - Voltage","Ohm's Law - Current","DC Power","Electrical Energy",
        "Single-Phase Current","Three-Phase Current","Three-Phase Real Power","Three-Phase kVA","Power Factor from kW & kVA","Capacitor kVAR for PF Correction",
        "Transformer Full-Load Current","Transformer Fault Current","Transformer Loading","Transformer Turns Ratio",
        "Motor Synchronous Speed","Motor Slip","Motor Torque",
        "Voltage Drop - 1 Phase","Voltage Drop - 3 Phase","Cable Power Loss",
        "Short-Circuit MVA","Fault Current from Fault MVA","Feeder / Transformer Loading","Voltage Deviation %",
        "4-20 mA Scaling","CT Secondary Current","Battery Backup Time","UPS Load %","SAIDI","SAIFI",
        "kW to HP","HP to kW","kW to Amp - 3 Phase"
    };
    final int[] cats={0,0,0,0,1,1,2,2,2,2,5,5,5,5,6,6,6,7,7,7,4,4,3,3,9,9,10,10,3,3,11,11,10};
    final String[][] labels={
        {"Current (A)","Resistance (Ω)"},{"Voltage (V)","Resistance (Ω)"},{"Voltage (V)","Current (A)"},{"Power (kW)","Time (h)"},
        {"Power (kW)","Voltage (V)","Power Factor","Efficiency (%)"},{"Power (kW)","Line Voltage (V)","Power Factor","Efficiency (%)"},{"Line Voltage (V)","Line Current (A)","Power Factor"},{"Line Voltage (V)","Line Current (A)"},{"Real Power (kW)","Apparent Power (kVA)"},{"Real Power (kW)","Existing PF","Target PF"},
        {"Rating (MVA)","Voltage (kV)"},{"Rating (MVA)","Voltage (kV)","Impedance (%)"},{"Actual Load (MVA)","Rated MVA"},{"Primary Voltage","Secondary Voltage"},
        {"Frequency (Hz)","Poles"},{"Synchronous Speed (rpm)","Rotor Speed (rpm)"},{"Shaft Power (kW)","Speed (rpm)"},
        {"Current (A)","Resistance (Ω/km)","Length (km)","Power Factor"},{"Current (A)","Resistance (Ω/km)","Length (km)","Power Factor"},{"Current (A)","Cable Resistance (Ω)"},
        {"Voltage (kV)","Fault Current (kA)"},{"Fault MVA","Voltage (kV)"},{"Actual (A or MVA)","Rating (same unit)"},{"Actual Voltage","Nominal Voltage"},
        {"Loop Current (mA)","LRV","URV"},{"Primary Current (A)","CT Primary Rating","CT Secondary Rating"},{"Capacity (Ah)","Voltage (V)","Usable Efficiency (%)","Load (W)"},{"Load (kW)","UPS Rating (kW)"},{"Customer Interruption Minutes","Total Customers Served"},{"Total Customer Interruptions","Total Customers Served"},
        {"Power (kW)"},{"Power (HP)"},{"Power (kW)","Voltage (V)","Power Factor","Efficiency (%)"}
    };
    final String[] formulas={
        "V = I × R","I = V / R","P = V × I","E = P × t",
        "I = P / (V × PF × η)","I = P / (√3 × V × PF × η)","P = √3 × V × I × PF","S = √3 × V × I / 1000","PF = kW / kVA","Qc = P × (tan φ1 − tan φ2)",
        "I = S / (√3 × V)","Isc = Irated × 100 / Z%","Loading% = Actual / Rated × 100","Ratio = Vp / Vs",
        "Ns = 120f / poles","Slip% = (Ns − Nr) / Ns × 100","T = 9550 × kW / rpm",
        "ΔV = 2 × I × R × L × PF","ΔV = √3 × I × R × L × PF","Ploss = I²R",
        "Ssc = √3 × kV × kA","Isc = MVA / (√3 × kV)","Loading% = Actual / Rating × 100","Deviation% = (Actual − Nominal) / Nominal × 100",
        "PV = LRV + (mA−4)/16 × (URV−LRV)","Isec = Ipri × CTsec / CTpri","Hours = Ah × V × η / W","Load% = Load / Rating × 100","SAIDI = Interruption Minutes / Customers Served","SAIFI = Customer Interruptions / Customers Served",
        "HP = kW × 1.34102","kW = HP × 0.7457","I = kW×1000 / (√3 × V × PF × η)"
    };
    final String[] units={"V","A","W","kWh","A","A","W","kVA","","kVAR","A","A","%","ratio","rpm","%","N·m","V","V","W","MVA","kA","%","%","EU","A","h","%","min/customer","interruptions/customer","HP","kW","A"};

    @Override public void onCreate(Bundle b){super.onCreate(b);getWindow().setStatusBarColor(NAVY);showHome();}

    GradientDrawable bg(int color,float radius){GradientDrawable g=new GradientDrawable();g.setColor(color);g.setCornerRadius(radius);return g;}
    TextView text(String s,float sp,int color,boolean bold){TextView t=new TextView(this);t.setText(s);t.setTextSize(sp);t.setTextColor(color);t.setGravity(Gravity.CENTER_VERTICAL);t.setPadding(10,8,10,8);if(bold)t.setTypeface(Typeface.DEFAULT,Typeface.BOLD);return t;}
    void addSpace(int h){Space s=new Space(this);page.addView(s,new LinearLayout.LayoutParams(1,h));}
    LinearLayout card(int color,int pad,int radius){LinearLayout l=new LinearLayout(this);l.setOrientation(LinearLayout.VERTICAL);l.setPadding(pad,pad,pad,pad);l.setBackground(bg(color,radius));return l;}

    void basePage(){scroll=new ScrollView(this);scroll.setFillViewport(true);page=new LinearLayout(this);page.setOrientation(LinearLayout.VERTICAL);page.setPadding(16,0,16,28);page.setBackgroundColor(LIGHT);scroll.addView(page);setContentView(scroll);}

    void showHome(){basePage();
        LinearLayout header=card(NAVY,18,0);header.setPadding(18,20,18,18);
        LinearLayout top=new LinearLayout(this);top.setGravity(Gravity.CENTER_VERTICAL);
        TextView logo=text("⚡\nEEMC",18,Color.WHITE,true);logo.setGravity(Gravity.CENTER);logo.setBackground(bg(ORANGE,60));top.addView(logo,new LinearLayout.LayoutParams(84,84));
        LinearLayout ht=new LinearLayout(this);ht.setOrientation(LinearLayout.VERTICAL);ht.setPadding(14,0,0,0);ht.addView(text("Electrical Engineer\nMaster Calculator (EEMC)",23,Color.WHITE,true));ht.addView(text("Developed by Jeyaraj",14,Color.rgb(211,232,248),false));top.addView(ht,new LinearLayout.LayoutParams(0,-2,1));header.addView(top);page.addView(header,new LinearLayout.LayoutParams(-1,-2));

        LinearLayout hero=card(Color.WHITE,18,24);GradientDrawable heroBg=new GradientDrawable(GradientDrawable.Orientation.LEFT_RIGHT,new int[]{Color.rgb(224,243,255),Color.rgb(255,239,210)});heroBg.setCornerRadius(24);hero.setBackground(heroBg);hero.addView(text("Hello, Engineer!",30,TEXT,true));hero.addView(text("Calculate • Learn • Apply • Grow",16,Color.rgb(68,94,117),false));
        int last=getPreferences(0).getInt("quote",-1),q=new Random().nextInt(quotes.length);if(q==last)q=(q+1)%quotes.length;getPreferences(0).edit().putInt("quote",q).apply();TextView qt=text("“ "+quotes[q]+" ”",20,NAVY,true);qt.setGravity(Gravity.CENTER);qt.setPadding(14,18,14,18);hero.addView(qt);page.addView(hero);addSpace(12);

        EditText search=new EditText(this);search.setHint("Search calculators, formulas, topics...");search.setTextSize(16);search.setSingleLine(true);search.setCompoundDrawablesWithIntrinsicBounds(android.R.drawable.ic_menu_search,0,0,0);search.setCompoundDrawablePadding(12);search.setPadding(20,4,20,4);search.setBackground(bg(Color.WHITE,28));page.addView(search,new LinearLayout.LayoutParams(-1,62));search.setOnEditorActionListener((v,id,e)->{findCalculator(v.getText().toString());return true;});addSpace(12);

        page.addView(text("Calculation Mode",20,TEXT,true));modeBar=new LinearLayout(this);modeBar.setOrientation(LinearLayout.HORIZONTAL);modeBar.setPadding(0,4,0,8);page.addView(modeBar);addModeButton("⚡\nQuick","Fast answer",GREEN);addModeButton("⚙\nEngineer","Formula + working",BLUE);addModeButton("▣\nLearning","Explain + origin",ORANGE);

        LinearLayout rowTitle=new LinearLayout(this);rowTitle.setGravity(Gravity.CENTER_VERTICAL);rowTitle.addView(text("Calculators & Tools",23,TEXT,true),new LinearLayout.LayoutParams(0,-2,1));TextView all=text("See All ›",15,BLUE,true);all.setOnClickListener(v->showAll());rowTitle.addView(all);page.addView(rowTitle);addSpace(6);

        for(int r=0;r<4;r++){LinearLayout row=new LinearLayout(this);row.setOrientation(LinearLayout.HORIZONTAL);for(int c=0;c<3;c++){int idx=r*3+c;LinearLayout cc=categoryCard(idx);LinearLayout.LayoutParams lp=new LinearLayout.LayoutParams(0,128,1);lp.setMargins(5,5,5,5);row.addView(cc,lp);}page.addView(row);}addSpace(12);

        LinearLayout quoteCard=card(Color.rgb(229,243,252),14,20);TextView bottom=text("“ Electrical engineering today for a brighter tomorrow. ”",17,Color.rgb(55,109,150),true);bottom.setGravity(Gravity.CENTER);quoteCard.addView(bottom);page.addView(quoteCard);addSpace(12);
        LinearLayout nav=card(Color.WHITE,8,22);LinearLayout navrow=new LinearLayout(this);String[] n={"⌂\nHome","☆\nFavorites","◷\nHistory","▤\nNotes","☰\nMore"};for(String s:n){TextView z=text(s,13,TEXT,false);z.setGravity(Gravity.CENTER);navrow.addView(z,new LinearLayout.LayoutParams(0,58,1));}nav.addView(navrow);page.addView(nav);
    }

    void addModeButton(String title,String sub,int color){LinearLayout m=card(color,8,18);TextView a=text(title,16,Color.WHITE,true);a.setGravity(Gravity.CENTER);TextView b=text(sub,11,Color.WHITE,false);b.setGravity(Gravity.CENTER);m.addView(a);m.addView(b);String name=title.contains("Quick")?"Quick":title.contains("Learning")?"Learning":"Engineer";m.setOnClickListener(v->{mode=name;Toast.makeText(this,name+" Mode selected",Toast.LENGTH_SHORT).show();});LinearLayout.LayoutParams lp=new LinearLayout.LayoutParams(0,104,1);lp.setMargins(4,4,4,4);modeBar.addView(m,lp);}

    LinearLayout categoryCard(int i){LinearLayout c=card(catColors[i],8,20);c.setGravity(Gravity.CENTER);TextView ic=text(catIcons[i],27,Color.WHITE,true);ic.setGravity(Gravity.CENTER);TextView nm=text(catNames[i],14,Color.WHITE,true);nm.setGravity(Gravity.CENTER);c.addView(ic);c.addView(nm);c.setOnClickListener(v->showCategory(i));return c;}

    void showCategory(int cat){ArrayList<Integer> idx=new ArrayList<>();ArrayList<String> n=new ArrayList<>();for(int i=0;i<names.length;i++)if(cats[i]==cat){idx.add(i);n.add(names[i]);}if(n.size()==0){new AlertDialog.Builder(this).setTitle(catNames[cat]).setMessage("More calculators for this category are being added in the next library expansion.").setPositiveButton("OK",null).show();return;}new AlertDialog.Builder(this).setTitle(catNames[cat]).setItems(n.toArray(new String[0]),(d,w)->showCalculator(idx.get(w))).setNegativeButton("Cancel",null).show();}
    void showAll(){new AlertDialog.Builder(this).setTitle("All Calculators").setItems(names,(d,w)->showCalculator(w)).setNegativeButton("Cancel",null).show();}
    void findCalculator(String s){if(s==null||s.trim().isEmpty()){showAll();return;}String q=s.toLowerCase();for(int i=0;i<names.length;i++)if(names[i].toLowerCase().contains(q)||formulas[i].toLowerCase().contains(q)){showCalculator(i);return;}Toast.makeText(this,"No matching calculator found",Toast.LENGTH_SHORT).show();}

    void showCalculator(int p){activeCalc=p;basePage();
        LinearLayout bar=card(NAVY,12,0);LinearLayout rr=new LinearLayout(this);rr.setGravity(Gravity.CENTER_VERTICAL);TextView back=text("‹",38,Color.WHITE,true);back.setGravity(Gravity.CENTER);back.setOnClickListener(v->showHome());rr.addView(back,new LinearLayout.LayoutParams(54,58));rr.addView(text(names[p],21,Color.WHITE,true),new LinearLayout.LayoutParams(0,58,1));TextView fav=text("♡",30,Color.WHITE,false);fav.setGravity(Gravity.CENTER);rr.addView(fav,new LinearLayout.LayoutParams(54,58));bar.addView(rr);page.addView(bar);addSpace(12);

        LinearLayout intro=card(Color.WHITE,16,22);LinearLayout ih=new LinearLayout(this);ih.setGravity(Gravity.CENTER_VERTICAL);TextView icon=text(catIcons[cats[p]],28,Color.WHITE,true);icon.setGravity(Gravity.CENTER);icon.setBackground(bg(catColors[cats[p]],18));ih.addView(icon,new LinearLayout.LayoutParams(68,68));LinearLayout it=new LinearLayout(this);it.setOrientation(LinearLayout.VERTICAL);it.setPadding(12,0,0,0);it.addView(text(names[p],24,TEXT,true));it.addView(text(catNames[cats[p]]+"  •  Useful for daily electrical work",13,Color.rgb(93,116,137),false));ih.addView(it,new LinearLayout.LayoutParams(0,-2,1));intro.addView(ih);page.addView(intro);addSpace(10);

        LinearLayout modeMini=new LinearLayout(this);String[] mm={"Quick","Engineer","Learning"};for(String m:mm){Button b=new Button(this);b.setText(m);b.setTextSize(13);b.setAllCaps(false);b.setTextColor(Color.WHITE);b.setBackground(bg(m.equals(mode)?BLUE:Color.rgb(121,145,164),14));b.setOnClickListener(v->{mode=((Button)v).getText().toString();showCalculator(activeCalc);});LinearLayout.LayoutParams lp=new LinearLayout.LayoutParams(0,52,1);lp.setMargins(3,0,3,0);modeMini.addView(b,lp);}page.addView(modeMini);addSpace(10);

        fields=card(Color.WHITE,14,22);for(int i=0;i<labels[p].length;i++){fields.addView(text(labels[p][i],14,TEXT,true));input[i]=new EditText(this);input[i].setTextSize(18);input[i].setTextColor(TEXT);input[i].setInputType(InputType.TYPE_CLASS_NUMBER|InputType.TYPE_NUMBER_FLAG_DECIMAL|InputType.TYPE_NUMBER_FLAG_SIGNED);input[i].setPadding(14,8,14,8);input[i].setBackground(bg(Color.rgb(243,248,252),14));LinearLayout.LayoutParams lp=new LinearLayout.LayoutParams(-1,58);lp.setMargins(0,0,0,8);fields.addView(input[i],lp);}Button calc=new Button(this);calc.setText("▣  Calculate");calc.setTextSize(18);calc.setTextColor(Color.WHITE);calc.setAllCaps(false);calc.setBackground(bg(BLUE,15));calc.setOnClickListener(v->calculate(p));LinearLayout.LayoutParams bp=new LinearLayout.LayoutParams(-1,62);bp.setMargins(0,6,0,0);fields.addView(calc,bp);page.addView(fields);addSpace(10);
        results=new LinearLayout(this);results.setOrientation(LinearLayout.VERTICAL);page.addView(results);
        if(!mode.equals("Quick")){results.addView(infoPanel("Σ  Formula",formulas[p],BLUE));if(mode.equals("Learning")){results.addView(infoPanel("▣  Derivation",derivationFor(p),PURPLE));results.addView(infoPanel("💡  Invented / Origin",originFor(p),YELLOW));}}
    }

    TextView infoPanel(String h,String body,int accent){TextView t=text(h+"\n\n"+body,16,TEXT,false);t.setTypeface(Typeface.DEFAULT);t.setBackground(bg(Color.WHITE,20));t.setPadding(18,16,18,16);LinearLayout.LayoutParams lp=new LinearLayout.LayoutParams(-1,-2);lp.setMargins(0,0,0,10);t.setLayoutParams(lp);return t;}
    double d(int i){return Double.parseDouble(input[i].getText().toString().trim());}
    String fmt(double x){if(Math.abs(x)>=1000)return String.format(Locale.US,"%,.2f",x);return String.format(Locale.US,"%.3f",x).replaceAll("0+$","").replaceAll("\\.$","");}

    void calculate(int p){try{double x=0;String w="";switch(p){
        case 0:x=d(0)*d(1);w="V = "+d(0)+" × "+d(1);break;case 1:x=d(0)/d(1);w="I = "+d(0)+" / "+d(1);break;case 2:x=d(0)*d(1);w="P = "+d(0)+" × "+d(1);break;case 3:x=d(0)*d(1);w="E = "+d(0)+" × "+d(1);break;
        case 4:x=d(0)*1000/(d(1)*d(2)*d(3)/100);w="I = "+(d(0)*1000)+" / ("+d(1)+" × "+d(2)+" × "+(d(3)/100)+")";break;case 5:x=d(0)*1000/(Math.sqrt(3)*d(1)*d(2)*d(3)/100);w="I = "+(d(0)*1000)+" / (1.732 × "+d(1)+" × "+d(2)+" × "+(d(3)/100)+")";break;case 6:x=Math.sqrt(3)*d(0)*d(1)*d(2);w="P = 1.732 × "+d(0)+" × "+d(1)+" × "+d(2);break;case 7:x=Math.sqrt(3)*d(0)*d(1)/1000;w="S = 1.732 × "+d(0)+" × "+d(1)+" / 1000";break;case 8:x=d(0)/d(1);w="PF = "+d(0)+" / "+d(1);break;case 9:double a=Math.acos(d(1)),b=Math.acos(d(2));x=d(0)*(Math.tan(a)-Math.tan(b));w="Qc = "+d(0)+" × (tan("+fmt(a)+") − tan("+fmt(b)+"))";break;
        case 10:x=d(0)*1000000/(Math.sqrt(3)*d(1)*1000);w="I = "+(d(0)*1000000)+" / (1.732 × "+(d(1)*1000)+")";break;case 11:double ir=d(0)*1000000/(Math.sqrt(3)*d(1)*1000);x=ir*100/d(2);w="Irated = "+fmt(ir)+" A\nIsc = "+fmt(ir)+" × 100 / "+d(2);break;case 12:x=d(0)/d(1)*100;w="Loading = "+d(0)+" / "+d(1)+" × 100";break;case 13:x=d(0)/d(1);w="Ratio = "+d(0)+" / "+d(1);break;
        case 14:x=120*d(0)/d(1);w="Ns = 120 × "+d(0)+" / "+d(1);break;case 15:x=(d(0)-d(1))/d(0)*100;w="Slip = ("+d(0)+" − "+d(1)+") / "+d(0)+" × 100";break;case 16:x=9550*d(0)/d(1);w="T = 9550 × "+d(0)+" / "+d(1);break;
        case 17:x=2*d(0)*d(1)*d(2)*d(3);w="ΔV = 2 × "+d(0)+" × "+d(1)+" × "+d(2)+" × "+d(3);break;case 18:x=Math.sqrt(3)*d(0)*d(1)*d(2)*d(3);w="ΔV = 1.732 × "+d(0)+" × "+d(1)+" × "+d(2)+" × "+d(3);break;case 19:x=d(0)*d(0)*d(1);w="Ploss = "+d(0)+"² × "+d(1);break;
        case 20:x=Math.sqrt(3)*d(0)*d(1);w="Ssc = 1.732 × "+d(0)+" × "+d(1);break;case 21:x=d(0)/(Math.sqrt(3)*d(1));w="Isc = "+d(0)+" / (1.732 × "+d(1)+")";break;case 22:x=d(0)/d(1)*100;w="Loading = "+d(0)+" / "+d(1)+" × 100";break;case 23:x=(d(0)-d(1))/d(1)*100;w="Deviation = ("+d(0)+" − "+d(1)+") / "+d(1)+" × 100";break;
        case 24:x=d(1)+(d(0)-4)/16*(d(2)-d(1));w="PV = "+d(1)+" + ("+d(0)+"−4)/16 × ("+d(2)+"−"+d(1)+")";break;case 25:x=d(0)*d(2)/d(1);w="Isec = "+d(0)+" × "+d(2)+" / "+d(1);break;case 26:x=d(0)*d(1)*d(2)/100/d(3);w="Hours = "+d(0)+" × "+d(1)+" × "+(d(2)/100)+" / "+d(3);break;case 27:x=d(0)/d(1)*100;w="Load = "+d(0)+" / "+d(1)+" × 100";break;case 28:x=d(0)/d(1);w="SAIDI = "+d(0)+" / "+d(1);break;case 29:x=d(0)/d(1);w="SAIFI = "+d(0)+" / "+d(1);break;
        case 30:x=d(0)*1.34102;w="HP = "+d(0)+" × 1.34102";break;case 31:x=d(0)*0.7457;w="kW = "+d(0)+" × 0.7457";break;case 32:x=d(0)*1000/(Math.sqrt(3)*d(1)*d(2)*d(3)/100);w="I = "+(d(0)*1000)+" / (1.732 × "+d(1)+" × "+d(2)+" × "+(d(3)/100)+")";break;}
        results.removeAllViews();if(!mode.equals("Quick"))results.addView(infoPanel("Σ  Formula",formulas[p],BLUE));
        if(!mode.equals("Quick"))results.addView(infoPanel("⚙  Working",w+"\n\nAnswer = "+fmt(x)+" "+units[p],BLUE));
        TextView ans=text("✓  Answer\n\n"+fmt(x)+" "+units[p],27,Color.rgb(14,106,55),true);ans.setBackground(bg(Color.rgb(222,248,229),20));ans.setGravity(Gravity.CENTER_VERTICAL);ans.setPadding(20,18,20,18);LinearLayout.LayoutParams alp=new LinearLayout.LayoutParams(-1,-2);alp.setMargins(0,0,0,10);ans.setLayoutParams(alp);results.addView(ans);
        if(mode.equals("Learning")){results.addView(infoPanel("▣  Derivation",derivationFor(p),PURPLE));results.addView(infoPanel("💡  Invented / Origin",originFor(p),YELLOW));results.addView(infoPanel("⚠  Engineering Note","Use this as a calculation aid. For equipment selection and field implementation, confirm ratings, installation conditions, protection coordination, manufacturer data, and applicable IEC/IEEE/BS/local requirements.",ORANGE));}
    }catch(Exception e){Toast.makeText(this,"Enter valid values in all fields",Toast.LENGTH_LONG).show();}}

    String derivationFor(int p){if(p<=2)return "Start from the basic electrical relationship between voltage, current and resistance/power, then algebraically rearrange for the required quantity.";if(p>=4&&p<=8)return "For balanced AC systems, total power is obtained from the phase relationships. In three-phase systems the √3 factor appears when line quantities are used.";if(p>=10&&p<=13)return "Transformer relationships follow conservation of power, voltage/current ratio and percentage impedance principles.";if(p>=20&&p<=23)return "Fault and grid quantities are derived from the three-phase apparent-power relationship and system impedance.";return "The displayed equation is rearranged from the standard engineering relationship using consistent SI units.";}
    String originFor(int p){if(p==0||p==1)return "Ohm's law is associated with Georg Simon Ohm, who published his work in 1827.";if(p==2)return "Electrical power relationships developed from foundational work in circuit theory; watt is named after James Watt, but P = VI is not attributed to a single inventor.";if(p>=4&&p<=8)return "Balanced AC and polyphase relationships developed through the work of several engineers and scientists during the development of alternating-current systems; no single-inventor attribution is appropriate.";if(p>=10&&p<=13)return "Transformer theory developed from electromagnetic induction and practical transformer engineering. Michael Faraday's induction work is foundational, while practical transformer development involved multiple inventors.";if(p==14||p==15)return "Synchronous-speed and induction-motor relationships emerged from rotating magnetic-field and AC machine theory developed by multiple 19th-century pioneers.";if(p==24)return "4–20 mA scaling is an industrial instrumentation convention, not a formula invented by one person.";return "Established engineering relationship. Where no historically reliable single inventor exists, EEMC avoids assigning one.";}

    @Override public void onBackPressed(){showHome();}
}
