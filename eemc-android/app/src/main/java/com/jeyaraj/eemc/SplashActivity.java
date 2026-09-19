package com.jeyaraj.eemc;

import android.app.Activity;
import android.os.Bundle;
import android.os.Handler;
import android.content.Intent;
import android.graphics.Color;
import android.graphics.Typeface;
import android.graphics.drawable.GradientDrawable;
import android.view.Gravity;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;
import java.util.Random;

public class SplashActivity extends Activity {
    private final String[] quotes = {
        "Safety, precision, and power go hand in hand.",
        "Every safe circuit begins with a correct calculation.",
        "Measure twice, energize once.",
        "Reliable grids are built one verified calculation at a time.",
        "Calculate. Verify. Energize safely.",
        "Engineering a brighter, safer tomorrow."
    };

    @Override public void onCreate(Bundle b) {
        super.onCreate(b);
        getWindow().setStatusBarColor(Color.rgb(6, 58, 96));
        getWindow().setNavigationBarColor(Color.rgb(6, 58, 96));

        LinearLayout root = new LinearLayout(this);
        root.setOrientation(LinearLayout.VERTICAL);
        root.setGravity(Gravity.CENTER_HORIZONTAL);
        root.setPadding(34, 54, 34, 42);
        GradientDrawable bg = new GradientDrawable(
                GradientDrawable.Orientation.TOP_BOTTOM,
                new int[]{Color.rgb(218,241,255), Color.rgb(255,246,221), Color.rgb(7,76,121)});
        root.setBackground(bg);

        ImageView logo = new ImageView(this);
        logo.setImageResource(com.jeyaraj.eemc.R.drawable.eemc_logo);
        logo.setScaleType(ImageView.ScaleType.FIT_CENTER);
        LinearLayout.LayoutParams logoLp = new LinearLayout.LayoutParams(245,245);
        logoLp.topMargin = 26;
        root.addView(logo, logoLp);

        TextView title = t("Electrical Engineer\nMaster Calculator\n(EEMC)", 30, Color.rgb(7,55,93), true);
        title.setGravity(Gravity.CENTER);
        title.setLineSpacing(0,1.05f);
        root.addView(title);

        TextView dev = t("Developed by Jeyaraj", 17, Color.rgb(28,67,99), false);
        dev.setGravity(Gravity.CENTER);
        root.addView(dev);

        TextView strip = t("172 FORMULAS  •  20 CATEGORIES  •  OFFLINE", 14, Color.rgb(7,55,93), true);
        strip.setGravity(Gravity.CENTER);
        strip.setPadding(22,12,22,12);
        GradientDrawable white = new GradientDrawable();
        white.setColor(Color.argb(230,255,255,255));
        white.setCornerRadius(40);
        strip.setBackground(white);
        LinearLayout.LayoutParams stripLp = new LinearLayout.LayoutParams(-2,-2);
        stripLp.topMargin = 18;
        root.addView(strip, stripLp);

        TextView quote = t("“ " + quotes[new Random().nextInt(quotes.length)] + " ”", 20, Color.rgb(10,57,90), true);
        quote.setGravity(Gravity.CENTER);
        quote.setPadding(24,24,24,24);
        GradientDrawable qbg = new GradientDrawable();
        qbg.setColor(Color.argb(220,255,255,255));
        qbg.setCornerRadius(28);
        quote.setBackground(qbg);
        LinearLayout.LayoutParams qLp = new LinearLayout.LayoutParams(-1,-2);
        qLp.topMargin = 28;
        root.addView(quote, qLp);

        TextView footer = t("FORMULA  •  DERIVATION  •  CALCULATOR  •  PDF", 15, Color.WHITE, true);
        footer.setGravity(Gravity.CENTER);
        LinearLayout.LayoutParams fLp = new LinearLayout.LayoutParams(-1,0,1);
        footer.setGravity(Gravity.BOTTOM | Gravity.CENTER_HORIZONTAL);
        footer.setPadding(8,8,8,14);
        root.addView(footer, fLp);

        setContentView(root);

        new Handler(getMainLooper()).postDelayed(() -> {
            startActivity(new Intent(SplashActivity.this, FormulaLibraryActivity.class));
            finish();
        }, 1200);
    }

    private TextView t(String s, float size, int color, boolean bold) {
        TextView v = new TextView(this);
        v.setText(s);
        v.setTextSize(size);
        v.setTextColor(color);
        if (bold) v.setTypeface(Typeface.DEFAULT, Typeface.BOLD);
        return v;
    }
}
