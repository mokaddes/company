import{i as b,d as i,o as p,f as h,w as r,a as t,q as d,t as n,n as _,Z as w,c as v,e as a,F as k}from"./app-GRePl1c-.js";import{_ as m,L as y}from"./Layout-Bg1KTNXe.js";const S={components:{Link:b},props:{slug:String,title:String,image:String,company:String,description:String,btnColor:String,btnText:String}},C={class:"relative z-10 px-[12%] py-[14%] text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out"},L={class:"uppercase text-[28px] tracking-[4.5px] font-light leading-[0.8em]"},W={class:"text-[30px] font-bold"},$={class:"text-[18px] mb-[27px] mt-[13px]"};function j(c,e,o,u,g,x){const s=i("Link");return p(),h(s,{href:c.route("frontend.work.detail",[o.slug]),class:"group cursor-pointer relative block"},{default:r(()=>[t("div",{class:"w-full h-full flex flex-col justify-center items-center relative bg-cover bg-center bg-no-repeat",style:_({backgroundImage:`url(${o.image})`})},[t("div",{class:d(`w-full h-full absolute top-0 left-0 bg-${o.btnColor}-500 opacity-0 group-hover:opacity-90 transition-opacity duration-300 ease-in-out`)},null,2),t("div",C,[t("p",L,n(o.company),1),t("h2",W,n(o.title),1),t("p",$,n(o.description),1),t("button",{class:d(`border-y-4 border-x-0 border-black text-[18px] font-bold tracking-[2.5px] uppercase px-[24.5px] animatedButton py-[8px] hover:text-${o.btnColor}-500`)},n(o.btnText),3)])],4)]),_:1},8,["href"])}const B=m(S,[["render",j],["__scopeId","data-v-26a437fe"]]),T={components:{Layout:y,WorkCard:B,Head:w}},H={class:"mx-auto w-full max-w-[1920px] bg-black flex flex-col justify-center overflow-hidden relative"},I={class:"w-full flex flex-col justify-center items-start max-w-[1540px] mx-auto px-0 md:px-5 relative"},z={class:"w-full grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mb-[min(302px,42vw)] md:mb-[212px]"};function E(c,e,o,u,g,x){const s=i("Head"),l=i("WorkCard"),f=i("Layout");return p(),v(k,null,[a(s,null,{default:r(()=>e[0]||(e[0]=[t("title",null,"Work",-1)])),_:1}),a(f,null,{default:r(()=>[t("div",H,[e[2]||(e[2]=t("div",{class:"hidden md:block absolute top-0 right-0 md:left-[50%] md:w-[864px]"},[t("img",{src:"assets/images/Slats.png",alt:"Slats",class:"w-[864px] h-[371px]"})],-1)),e[3]||(e[3]=t("div",{class:"block md:hidden max-w-[644px] absolute w-full right-[-35%] top-0"},[t("img",{src:"assets/images/Slats.png",alt:"Slats",class:"w-full"})],-1)),t("div",I,[e[1]||(e[1]=t("div",{class:"h-[min(511px,71vw)] md:h-auto w-full text-white font-bold tracking-widest text-[min(60px,8.3vw)] lg:text-[58px] pt-[min(100px,13.9vw)] pl-[min(70px,9.7vw)] md:pt-[192px] md:pb-[143px] text-left relative"},[t("h1",null,"OUR WORK")],-1)),t("div",z,[a(l,{slug:"frontend-work-detail",title:"Creating a moment in time at Baselworld",image:"https://images.prismic.io/cheil-uk/6511948afbd9a45bcec80385_fbrsdhrh.jpg",company:"Samsung",description:"Want to deliver a world-class conference that inspires audiences?",btnColor:"blue",btnText:"Want to deliver a world class conference that inspires audiences?"}),a(l,{slug:"frontend-work-detail",title:"Powering Pet Owners",image:"https://images.prismic.io/cheil-uk/7f871bc8-ae61-4d17-9d19-1b2287de3ef5_Jet+Pet+Standing+Dog2.jpg",company:"Samsung",description:"Want to send your product viral?",btnColor:"pink",btnText:"See how"}),a(l,{slug:"frontend-work-detail",title:"Helping Men Embrace their Sensitive Side",image:"https://images.prismic.io/cheil-uk/12f7eab8-f4d2-4ef5-bb80-40f1ac6c4be9_maxresdefault.jpg",company:"NIVEA",description:"Looking to create a campaign that makes a difference?",btnColor:"red",btnText:"See how"})])])])]),_:1})],64)}const P=m(T,[["render",E]]);export{P as default};
