import{i as y,b as a,o as r,e as f,w as u,a as t,n as p,t as i,Z as w,c as m,d as x,F as g,r as k}from"./app-BnxJCrdW.js";import{_ as b,L as S}from"./Layout-BPiLRXrW.js";const C={components:{Link:y},props:{slug:String,title:String,image:String,company:String,description:String,btnColor:String,btnText:String},data(){return{isHovered:!1}}},L={class:"relative z-10 px-[12%] py-[14%] text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out"},H={class:"uppercase text-[28px] tracking-[4.5px] font-light leading-[0.8em]"},W={class:"text-[30px] font-bold"},j={class:"text-[18px] mb-[27px] mt-[13px]"};function B(n,o,e,_,l,v){const c=a("Link");return r(),f(c,{href:n.route("frontend.work.detail",[e.slug]),class:"group cursor-pointer relative block"},{default:u(()=>[t("div",{class:"w-full h-full flex flex-col justify-center items-center relative bg-cover bg-center bg-no-repeat",style:p({backgroundImage:`url(${e.image})`})},[t("div",{class:"w-full h-full absolute top-0 left-0 opacity-0 group-hover:opacity-90 transition-opacity duration-300 ease-in-out",style:p({backgroundColor:e.btnColor})},null,4),t("div",L,[t("p",H,i(e.company),1),t("h2",W,i(e.title),1),t("p",j,i(e.description),1),t("button",{class:"border-y-4 border-x-0 border-black text-[18px] font-bold tracking-[2.5px] uppercase px-[24.5px] animatedButton py-[8px]",style:p({color:l.isHovered?e.btnColor:"initial"}),onMouseenter:o[0]||(o[0]=d=>l.isHovered=!0),onMouseleave:o[1]||(o[1]=d=>l.isHovered=!1)},i(e.btnText),37)])],4)]),_:1},8,["href"])}const $=b(C,[["render",B],["__scopeId","data-v-57b694b0"]]),I={components:{Layout:S,WorkCard:$,Head:w},name:"Work/Index",props:{works:Object,seoData:Object}},O={class:"mx-auto w-full max-w-[1920px] bg-black flex flex-col justify-center overflow-hidden relative"},T={class:"hidden md:block absolute top-0 right-0 md:left-[50%] md:w-[864px]"},z=["src"],D={class:"block md:hidden max-w-[644px] absolute w-full right-[-35%] top-0"},F=["src"],M={class:"w-full flex flex-col justify-center items-start max-w-[1540px] mx-auto px-0 md:px-5 relative"},N={class:"w-full grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mb-[min(302px,42vw)] md:mb-[212px]"};function R(n,o,e,_,l,v){const c=a("Head"),d=a("WorkCard"),h=a("Layout");return r(),m(g,null,[x(c,null,{default:u(()=>o[0]||(o[0]=[t("title",null,"Work",-1)])),_:1}),x(h,null,{default:u(()=>[t("div",O,[t("div",T,[t("img",{src:n.asset("assets/images/Slats.png"),alt:"Slats",class:"w-[864px] h-[371px]"},null,8,z)]),t("div",D,[t("img",{src:n.asset("assets/images/Slats.png"),alt:"Slats",class:"w-full"},null,8,F)]),t("div",M,[o[1]||(o[1]=t("div",{class:"h-[min(511px,71vw)] md:h-auto w-full text-white font-bold tracking-widest text-[min(60px,8.3vw)] lg:text-[58px] pt-[min(100px,13.9vw)] pl-[min(70px,9.7vw)] md:pt-[192px] md:pb-[143px] text-left relative"},[t("h1",null,"OUR WORK")],-1)),t("div",N,[(r(!0),m(g,null,k(e.works,s=>(r(),f(d,{key:s.id,slug:s.slug,title:s.list_title,image:n.asset(s.thumbnail),company:s.brand,description:s.subtitle,btnColor:s.background_color,btnText:s.button_text},null,8,["slug","title","image","company","description","btnColor","btnText"]))),128))])])])]),_:1})],64)}const K=b(I,[["render",R]]);export{K as default};
