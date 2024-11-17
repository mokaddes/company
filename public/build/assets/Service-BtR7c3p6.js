import{_ as b,L as w}from"./Layout-Bg1KTNXe.js";import{o as c,c as d,a as e,F as g,r as y,n as a,t as n,Z as _,d as p,e as x,w as h,b as m}from"./app-GRePl1c-.js";const C={name:"ServiceIconBox",data(){return{activeHeader:"Our Expertise",activeSubheader:"We develop, optimise and localise global brands",activeDescription:"We are experts at customising, engineering, testing and publishing content for local market BAU activity and campaigns...",borderColor:"#19becc",items:[{name:"Strategy",color:"#1E90FF",header:"Our Strategy",subheader:"Strategy Subheader",description:"Strategy Description",icon:"strategy.svg"},{name:"Connected Commerce",color:"#32CD32",header:"Connected Commerce",subheader:"Commerce Subheader",description:"Commerce Description",icon:"connected.svg"},{name:"Experiential",color:"#FFA500",header:"Experiential Marketing",subheader:"Experiential Subheader",description:"Experiential Description",icon:"experiential.svg"},{name:"Retail",color:"#FF4500",header:"Retail Solutions",subheader:"Retail Subheader",description:"Retail Description",icon:"retail.svg"},{name:"Customer Experience",color:"#FF1493",header:"Customer Experience",subheader:"Experience Subheader",description:"Experience Description",icon:"production.svg"},{name:"Media",color:"#1E90FF",header:"Media Services",subheader:"Media Subheader",description:"Media Description",icon:"media.svg"},{name:"Data",color:"#32CD32",header:"Data Analytics",subheader:"Data Subheader",description:"Data Description",icon:"data.svg"},{name:"Creative",color:"#FFA500",header:"Creative Design",subheader:"Creative Subheader",description:"Creative Description",icon:"creative.svg"},{name:"Global Web Operations",color:"#FF4500",header:"Web Operations",subheader:"Operations Subheader",description:"Operations Description",icon:"ops.svg"}]}},methods:{setActiveContent(s){this.activeHeader=s.header,this.activeSubheader=s.subheader,this.activeDescription=s.description,this.borderColor=s.color},resetContent(){this.activeHeader="Our Expertise",this.activeSubheader="We develop, optimise and localise global brands",this.activeDescription="We are experts at customising, engineering, testing and publishing content for local market BAU activity and campaigns...",this.borderColor="#19becc"}}},S={class:"grid grid-cols-3 gap-2 lg:px-[min(5%,50px)]"},k=["onMouseenter"],D={class:"h-3/5 w-3/5 p-4 absolute top-3"},F=["src","alt"],E={class:"absolute inset-x-0 bottom-2 text-sm line-height-s"},B={class:"relative min-h-[470px] overflow-hidden pl-14"},j={class:"flex flex-col text-[22px]"},$={class:"font-bold text-[min(28px,3.88vw)] lg:text-[22px] my-5 font-Calibri"},z={class:"text-[min(28px,3.88vw)] lg:text-[22px] my-5 font-Calibri"};function L(s,t,u,v,o,r){return c(),d(g,null,[e("div",S,[(c(!0),d(g,null,y(o.items,i=>(c(),d("div",{key:i.name,class:"iconbox relative flex flex-col justify-center items-center min-h-[130px] min-w-[100px] xl:h-[130px] text-center overflow-hidden bg-[#0C0C0C]",onMouseenter:l=>r.setActiveContent(i),onMouseleave:t[0]||(t[0]=(...l)=>r.resetContent&&r.resetContent(...l))},[e("div",D,[e("img",{src:`/assets/images/${i.icon}`,alt:i.name,class:"p-3",decoding:"async",loading:"lazy",style:{position:"absolute",height:"100%",width:"100%",inset:"0px",color:"transparent"}},null,8,F)]),e("p",E,n(i.name),1),e("span",{class:"border-side side-bottom",style:a({borderColor:o.borderColor})},null,4),e("span",{class:"border-side side-left",style:a({borderColor:o.borderColor})},null,4),e("span",{class:"border-side side-top",style:a({borderColor:o.borderColor})},null,4),e("span",{class:"border-side side-right",style:a({borderColor:o.borderColor})},null,4)],40,k))),128))]),e("div",B,[e("div",j,[e("h1",{class:"text-[min(60px,8.3vw)] lg:text-[36px] font-Calibri uppercase tracking-widest",style:a({color:o.borderColor})},n(o.activeHeader),5),e("p",$,n(o.activeSubheader),1),e("p",z,n(o.activeDescription),1)])])],64)}const M=b(C,[["render",L],["__scopeId","data-v-2557c008"]]),O={name:"Service",components:{ServiceIconBox:M,Layout:w,Head:_}},A={class:"w-full relative flex flex-col justify-center"},H={class:"relative bg-black w-full max-w-[1920px] h-screen max-h-[730px] text-white flex flex-col mx-auto overflow-hidden"},W={class:"lg:h-auto left-0 top-0 absolute lg:relative w-full object-cover"},I={class:"relative object-bottom flex items-center justify-center w-full max-w-[1920px] h-[90vh] max-h-[680px] overflow-hidden mx-auto"},R=["src"],V=["src"],N={class:"max-w-[600px] max-h-[415px] hidden lg:block absolute w-[100%] lg:left-[20%] xl:left-[25%] top-[22.6%]"},U=["src"],G={class:"max-w-[640px] max-h-[400px] block lg:hidden absolute w-[100%] left-[53%] sm:left-[53%] top-[0%]"},T=["src"],Z={class:"w-full relative bg-black text-white lg:pt-[10px] pb-20 md:pb-52 flex flex-col z-[0]"},q={class:"flex flex-col mx-auto w-full lg:px-[min(7%,104px)] xl:px-0",style:{"max-width":"1350px"}},J={class:"grid grid-cols-1 lg:grid-cols-2 gap-4 gap-y-14 items-start justify-center"},K={class:"block max-975:hidden",style:{opacity:"1",transform:"none"}},P=["src"];function Q(s,t,u,v,o,r){const i=p("Head"),l=p("ServiceIconBox"),f=p("Layout");return c(),d(g,null,[x(i,null,{default:h(()=>t[0]||(t[0]=[e("title",null,"Service",-1)])),_:1}),x(f,null,{default:h(()=>[e("div",A,[e("section",H,[e("div",W,[e("div",I,[e("img",{src:s.asset("assets/images/service.png"),alt:"Services background",class:"hidden lg:block","data-nimg":"fill",decoding:"async",loading:"lazy",sizes:"100vw",style:{position:"absolute",height:"100%",width:"100%",inset:"0px","object-fit":"cover","object-position":"center center",color:"transparent"}},null,8,R),e("img",{src:s.asset("assets/images/service.png"),alt:"Services background",class:"lg:hidden","data-nimg":"fill",decoding:"async",loading:"lazy",sizes:"100vw",style:{position:"absolute",height:"100%",width:"100%",inset:"0px","object-fit":"cover","object-position":"center center",color:"transparent"}},null,8,V)])]),t[1]||(t[1]=e("div",{class:"absolute w-full h-full max-h-[680px] bg-black bg-opacity-0"},null,-1)),t[2]||(t[2]=e("div",{class:"relative px-[min(14%,104px)] pt-[min(113px,16vw)] lg:pt-0 lg:px-0 lg:absolute lg:top-[23%] lg:left-[8.33%]",style:{opacity:"1",transform:"none"}},[e("h2",{class:"max-md:mt-[-20px] font-Calibri font-bold tracking-widest text-[min(60px,8.3vw)] lg:text-[48px] mb-[min(273px,38vw)] max-md:mb-[min(273px,50vw)] lg:mb-0 .line-height-m"},[m(" OUR "),e("br",{class:"block lg:hidden"}),m("SERVICES")])],-1)),e("div",N,[e("img",{src:s.asset("assets/images/Slats.svg"),alt:"Slats",class:"w-full lg:max-h-[380px] xl:max-h-[415px]","data-nimg":"1",decoding:"async",height:"685",loading:"eager",style:{color:"transparent"},width:"943"},null,8,U)]),e("div",G,[e("img",{src:s.asset("assets/images/Slats.svg"),alt:"Slats",class:"w-full","data-nimg":"1",decoding:"async",height:"408",loading:"eager",style:{color:"transparent"},width:"641"},null,8,T)]),t[3]||(t[3]=e("div",{class:"relative top-[0%] sm:top-[-15%] lg:absolute w-full px-[min(14%,104px)] lg:px-0 lg:w-[41.7%] lg:left-[53.75%] lg:top-[60%] xl:top-[46.9%] mb-[min(87px,12vw)] lg:mb-0"},[e("p",{class:"text-[min(28px,3.88vw)] lg:text-[min(26px,1.7vw)] xl:text-22px lg:my-11 max-w-[611px] max-975:max-w-[100%]"},[m(" We are an integrated agency with commerce at its heart. Bridging the three worlds of physical, digital and immersive experiences, we work across a broad range of services to forge deeper, more rewarding, connected experiences."),e("br")])],-1))]),e("section",Z,[e("div",q,[e("div",J,[x(l),t[4]||(t[4]=e("div",{class:"md:px-14 max-md:px-[min(14%,104px)]",style:{opacity:"1",transform:"none"}},[e("div",{class:""},[e("div",{class:"lg:translate-y-2/4"},[e("div",null,[e("h2",{class:"text-white uppercase text-[6.5vw] max-md:text-[5.5vw] lg:text-[25px] xl:text-[38px] tracking-[0.15em] text-left w-full"}," Looking to take your "),e("h2",{class:"text-white uppercase text-[6.5vw] lg:text-[25px] xl:text-[38px] tracking-[0.15em] text-left w-full max-md:mb-12"}," business further? ")]),e("br"),e("div",{class:"lg:hidden"},[e("a",{href:"mailto:newbusiness@cheil.com",rel:"noopener noreferrer",target:"_blank"},[e("button",{class:"border-y-4 border-x-0 border-[#EF89C1] border-solid text-[min(28px,3.88vw)] lg:text-[14px] font-Calibri font-bold tracking-[2.5px] uppercase px-[24.5px] py-[min(25px,3.5vw)] lg:py-[8px] relative overflow-hidden animatedButton hover:text-white w-full"}," Let's talk ")])]),e("div",{class:"hidden lg:block"},[e("a",{href:"mailto:newbusiness@cheil.com",rel:"noopener noreferrer",target:"_blank"},[e("button",{class:"border-y-4 border-x-0 border-[#EF89C1] border-solid text-[min(28px,3.88vw)] lg:text-[14px] font-Calibri font-bold tracking-[2.5px] uppercase px-[24.5px] py-[min(25px,3.5vw)] lg:py-[8px] relative overflow-hidden animatedButton hover:text-white"}," Let's talk ")])])])])],-1)),e("div",K,[e("img",{alt:"Small meeting arround a table","data-nimg":"1",decoding:"async",height:"427",loading:"lazy",src:s.asset("assets/images/lets_talk.webp"),style:{color:"transparent"},width:"640"},null,8,P)])])])])])]),_:1})],64)}const ee=b(O,[["render",Q]]);export{ee as default};
