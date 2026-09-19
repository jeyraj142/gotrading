import React,{useMemo,useState} from 'react';
import {createRoot} from 'react-dom/client';
import {Zap,Calculator,BookOpen,Search,Home,Star,Clock3,FileText,Menu,ChevronLeft,Heart,Lightbulb,Activity,TowerControl,Network,ShieldAlert,Boxes,Settings2,Cable,Gauge,Wrench,RefreshCcw,ChevronDown,CheckCircle2} from 'lucide-react';
import {FORMULAS} from './formulas.generated.js';
import './styles.css';

const cats=[
['Basic Electrical',Lightbulb,'c1'],['AC/DC Circuits',Activity,'c2'],['Power System',TowerControl,'c3'],['Grid / PSS / DSS',Network,'c4'],
['Protection & Faults',ShieldAlert,'c5'],['Transformers',Boxes,'c6'],['Motors & Drives',Settings2,'c7'],['Cable Sizing',Cable,'c8'],
['Earthing',Zap,'c9'],['Measurements',Gauge,'c10'],['Electrician Tools',Wrench,'c11'],['Unit Conversion',RefreshCcw,'c12']
];
const quotes=['Safety, precision, and power go hand in hand.','Calculate. Verify. Energize with confidence.','Reliable grids begin with correct engineering.','Measure twice. Energize once.','Every safe circuit begins with a correct calculation.'];
function Logo({small=false}){return <div className={'logo '+(small?'small':'')}><div className="ring"><Zap size={small?23:52} fill="currentColor"/><Calculator size={small?18:36}/><span>EEMC</span></div></div>}
function App(){
 const [screen,setScreen]=useState('home'),[mode,setMode]=useState('Engineer'),[selected,setSelected]=useState(FORMULAS[0]),[query,setQuery]=useState(''),[category,setCategory]=useState(null),[fav,setFav]=useState(false);
 const quote=useMemo(()=>quotes[new Date().getDate()%quotes.length],[]);
 const filtered=FORMULAS.filter(f=>(!category||f.cat===category)&&(!query||(`${f.title} ${f.cat} ${f.desc}`).toLowerCase().includes(query.toLowerCase())));
 const openCalc=f=>{setSelected(f);setScreen('calc');window.scrollTo(0,0)};
 return <div className="app-shell">{screen==='home'?<>
   <header className="topbar"><Logo small/><div><h1>Electrical Engineer<br/>Master Calculator (EEMC)</h1><p>Developed by Jeyaraj</p></div><div className="top-icons"><span>●</span><Menu size={24}/></div></header>
   <section className="hero"><div className="hero-overlay"><h2>Hello, Engineer!</h2><p>Small Calculations. A Brighter Tomorrow.</p><b>KNOW • CALCULATE • APPLY • GROW</b></div></section>
   <main><div className="search"><Search size={21}/><input value={query} onChange={e=>setQuery(e.target.value)} placeholder="Search calculators, formulas, topics..."/></div>
    <div className="modes"><button className={'mode quick '+(mode==='Quick'?'on':'')} onClick={()=>setMode('Quick')}><Zap/><b>Quick Mode</b><small>Fast Calculations</small></button><button className={'mode eng '+(mode==='Engineer'?'on':'')} onClick={()=>setMode('Engineer')}><Settings2/><b>Engineer Mode</b><small>Detailed & Professional</small></button><button className={'mode learn '+(mode==='Learning'?'on':'')} onClick={()=>setMode('Learning')}><BookOpen/><b>Learning Mode</b><small>Concepts & Examples</small></button></div>
    <div className="section-title"><h3>Calculators & Tools</h3><button onClick={()=>setCategory(null)}>See All ›</button></div>
    <div className="cat-grid">{cats.map(([name,Icon,cls])=><button key={name} className={'cat '+cls+(category===name?' active':'')} onClick={()=>setCategory(category===name?null:name)}><Icon/><b>{name}</b></button>)}</div>
    <div className="quote-card">“ {quote} ”</div><div className="section-title"><h3>{category||'Popular Calculators'}</h3><span>{filtered.length} tools</span></div>
    <div className="calc-list">{filtered.slice(0,12).map(f=><button key={f.id} onClick={()=>openCalc(f)}><div className="mini-icon"><Zap size={18}/></div><div><b>{f.title}</b><span>{f.cat}</span></div><span className="go">›</span></button>)}</div></main>
   <nav className="bottom"><button className="active"><Home/><span>Home</span></button><button><Star/><span>Favorites</span></button><button><Clock3/><span>History</span></button><button><FileText/><span>Notes</span></button><button><Menu/><span>More</span></button></nav>
  </>:<CalculatorScreen f={selected} mode={mode} onBack={()=>setScreen('home')} fav={fav} setFav={setFav}/>}</div>}
function CalculatorScreen({f,mode,onBack,fav,setFav}){
 const [vals,setVals]=useState(f.inputs.map(()=>'')),[result,setResult]=useState(null),[working,setWorking]=useState('');
 const calculate=()=>{try{const v=vals.map(Number);if(v.some(x=>!Number.isFinite(x)))throw Error();const x=Function('v','return '+f.calc)(v);if(!Number.isFinite(x))throw Error();setResult(x);setWorking(f.formula+'\n\nSubstitution:\n'+f.inputs.map((i,k)=>`${i[1]} = ${v[k]} ${i[2]}`).join('\n')+'\n\nCalculated result = '+format(x)+' '+f.unit);}catch{setResult('error')}};
 return <div className="calc-screen"><div className="calc-top"><button onClick={onBack}><ChevronLeft/></button><b>{f.title}</b><button onClick={()=>setFav(!fav)}><Heart fill={fav?'currentColor':'none'}/></button></div><div className="calc-body">
    <div className="calc-head-card"><div className="orange-icon"><TowerControl/></div><div><h2>{f.title}</h2><p>{f.desc}</p><span>{f.cat} &nbsp; | &nbsp; Useful for daily work</span></div></div>
    <div className="input-card">{f.inputs.map((it,i)=><label key={i}><span>{it[0]} ({it[1]})</span><div><input type="number" inputMode="decimal" value={vals[i]} onChange={e=>setVals(vals.map((x,k)=>k===i?e.target.value:x))}/><em>{it[2]}</em></div></label>)}<button className="calculate" onClick={calculate}><Calculator size={20}/> Calculate</button></div>
    {mode!=='Quick'&&<InfoCard title="Formula" icon="Σ"><div className="formula">{f.formula}</div><p>Inputs are entered using the units shown above.</p></InfoCard>}
    {mode!=='Quick'&&result!==null&&result!=='error'&&<InfoCard title="Working" icon="⚙"><pre>{working}</pre></InfoCard>}
    {result!==null&&<div className={'answer '+(result==='error'?'bad':'')}><div className="answer-title"><CheckCircle2/> Answer</div>{result==='error'?<b>Check all input values.</b>:<><strong>{format(result)} {f.unit}</strong><small>Calculated result</small></>}</div>}
    {mode==='Learning'&&<><InfoCard title="Derivation" icon="📘"><p>{f.derivation}</p></InfoCard><InfoCard title="Invented / Origin" icon="💡"><p>{f.origin}</p></InfoCard><InfoCard title="Engineering Note" icon="🛡"><p>Use this result as a calculation aid. Confirm manufacturer data, equipment ratings, protection studies, installation conditions and applicable IEC/IEEE/BS/local requirements before field implementation.</p></InfoCard></>}
   </div></div>}
function InfoCard({title,icon,children}){const [open,setOpen]=useState(true);return <section className="info-card"><button onClick={()=>setOpen(!open)}><span className="info-icon">{icon}</span><b>{title}</b><ChevronDown className={open?'rot':''}/></button>{open&&<div className="info-content">{children}</div>}</section>}
function format(x){return Math.abs(x)>=1000?x.toLocaleString(undefined,{maximumFractionDigits:3}):Number(x.toFixed(3)).toString()}
createRoot(document.getElementById('root')).render(<App/>);
