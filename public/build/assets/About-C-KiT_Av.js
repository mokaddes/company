import{_ as r,L as h}from"./Layout-BPiLRXrW.js";import{o,c as l,a as t,n as w,t as s,F as g,r as v,Z as y,b as u,d as x,w as m}from"./app-BnxJCrdW.js";const S={props:{bannerSrc:{type:String,default:"assets/images/coverVideoV2.mp4"},bannerTitle:{type:String,default:"ABOUT US"},missionTitle:{type:String},missionDescription:{type:String},visionTitle:{type:String,required:!0},visionDescription:{type:String},imageSrc:{type:String,required:!0,default:"assets/images/Slats.png"},imageAlt:{type:String,default:"Slats"}}},T={class:"relative bg-white w-full max-w-[1920px] text-white flex flex-col mx-auto overflow-hidden min-h-screen"},k=["alt"],$={class:"relative px-[min(14%,104px)] pt-[min(113px,16vw)] lg:pt-0 lg:px-0 lg:absolute lg:top-[23%] lg:left-[8.33%]"},A={class:"font-Calibri font-bold tracking-widest text-[min(60px,8.3vw)] lg:text-[58px] mb-[min(273px,38vw)] lg:mb-0"},C={class:"max-w-[644px] lg:max-w-[943px] block absolute w-[100%] lg:w-[min(943px,49vw)] right-[-35%] top-[0%] lg:left-[5%] lg:top-[35%]"},I=["alt","src"],D={class:"relative lg:absolute w-full px-[min(14%,104px)] lg:px-0 lg:w-[45%] lg:left-[55%] lg:top-[4%] mb-[min(87px,12vw)] lg:mb-0"},L={class:"text-[min(34px,4.72vw)] lg:text-[min(26px,1.7vw)] xl:text-22px mb-4 xl:mb-11"},q={class:"text-[min(34px,4.72vw)] lg:text-[min(26px,1.7vw)] xl:text-22px my-4 xl:my-11"},z={class:"text-[min(34px,4.72vw)] lg:text-[min(26px,1.7vw)] xl:text-22px mb-4 xl:mb-11"},B={class:"text-[min(34px,4.72vw)] lg:text-[min(26px,1.7vw)] xl:text-22px my-4 xl:my-11"};function j(a,n,e,p,i,d){return o(),l("section",T,[t("div",{class:"absolute w-full h-full bg-cover bg-center",style:w({backgroundImage:`url(${e.bannerSrc})`}),alt:e.bannerTitle},null,12,k),n[0]||(n[0]=t("div",{class:"absolute w-full h-full bg-black bg-opacity-80"},null,-1)),t("div",$,[t("h2",A,s(e.bannerTitle),1)]),t("div",C,[t("img",{alt:e.imageAlt,class:"w-full",src:a.asset(e.imageSrc)},null,8,I)]),t("div",D,[t("h4",L,s(e.missionTitle),1),t("p",q,s(e.missionDescription),1),t("h4",z,s(e.visionTitle),1),t("p",B,s(e.visionDescription),1)])])}const E=r(S,[["render",j],["__scopeId","data-v-11242343"]]),H={props:{title:{type:String,default:"MEET THE"},teamImages:{type:Object,required:!0}},name:"AboutTeamSection",mounted(){console.log(this.teamImages)}},O={class:"w-full bg-white text-black pt-[min(141px,19.58vw)] pb-[min(256px,35.5vw)] lg:py-44 lg:px-14 flex flex-col px-0"},P={class:"flex flex-col mx-auto w-full",style:{"max-width":"1920px"}},U={class:"w-full max-w-[1480px] mx-auto px-[min(14%,104px)] xl:px-0"},V={class:"font-Calibri font-bold tracking-widest text-[min(52px,7.2vw)] xl:text-[58px] mb-[min(66px,9.16vw)] lg:mb-28"},F={class:"lg:grid grid-cols-3 gap-12"},N=["src","alt"];function M(a,n,e,p,i,d){return o(),l("section",O,[t("div",P,[t("div",U,[t("h2",V,s(e.title.toUpperCase()),1)]),t("div",F,[(o(!0),l(g,null,v(e.teamImages,c=>(o(),l("div",{key:c.id,class:"min-w-[300px] flex-shrink-0 mb-3 lg:mb-0"},[t("img",{src:c.image,alt:c.id,class:"w-full h-auto object-cover",width:"300",height:"200",loading:"lazy"},null,8,N)]))),128))])])])}const W=r(H,[["render",M],["__scopeId","data-v-be5412f3"]]),Z={props:{logoAlt:{type:String,default:"Cheil Connect Logo"},logoSrc:{type:String,required:!0},textParagraph1:{type:String,default:"Collaboration doesn’t stop at our agency’s front door. With our Cheil Connec+ network, you’ll also have access to a wealth of expertise across the globe, all working together to create bespoke customer experiences across multiple disciplines, channels, and touchpoints."},textParagraph2:{type:String,default:"Want to find out more about our Cheil Connec+ Network?"},buttonLink:{type:String,default:"https://www.cheilconnect.com/"},buttonText:{type:String,default:"Learn more"}}},G={class:"w-full bg-black text-white pt-[min(138px,19vw)] lg:pt-[144px] pb-52 flex flex-col"},J={class:"flex flex-col lg:flex-row mx-auto w-full px-[min(14%,104px)] xl:px-0",style:{"max-width":"1480px"}},K={class:"mx-auto lg:mx-0 w-[60%] lg:w-1/3 self-start flex justify-center lg:justify-end pr-0 lg:pr-[35px] mb-[min(60px,8.33vw)]"},Q=["alt","src"],R={class:"w-full lg:w-2/3"},X={class:"text-[min(34px,4.72vw)] lg:text-[22px] flex flex-col gap-7 mb-16"},Y=["href"],tt={class:"border-y-4 border-x-0 border-[#EF89C1] border-solid text-[18px] font-Calibri tracking-[2.5px] uppercase px-[24.5px] py-[18.5px] relative overflow-hidden animatedButton"};function et(a,n,e,p,i,d){return o(),l("section",G,[t("div",J,[t("div",K,[t("img",{alt:e.logoAlt,loading:"lazy",width:"284",height:"69",decoding:"async",style:{color:"transparent"},src:e.logoSrc},null,8,Q)]),t("div",R,[t("div",X,[t("p",null,s(e.textParagraph1),1),t("p",null,s(e.textParagraph2),1)]),t("a",{href:e.buttonLink,target:"_blank"},[t("button",tt,s(e.buttonText),1)],8,Y)])])])}const it=r(Z,[["render",et],["__scopeId","data-v-bb8d842b"]]),st={props:{alt:{type:String,default:"photo"},src:{type:String,required:!0},sizes:{type:String,default:"100vw"}}},nt={class:"block lg:hidden w-full aspect-square relative"},ot=["alt","src","sizes"];function lt(a,n,e,p,i,d){return o(),l("div",nt,[t("img",{alt:e.alt,loading:"lazy",decoding:"async",src:e.src,sizes:e.sizes,style:{position:"absolute",height:"100%",width:"100%",left:"0",top:"0",right:"0",bottom:"0",color:"transparent"}},null,8,ot)])}const at=r(st,[["render",lt],["__scopeId","data-v-0e542346"]]),ct={components:{AboutMobileImage:at,Layout:h,AboutBannerSection:E,AboutTeamSection:W,AboutConnectSection:it,Head:y},props:{about:{type:Object,required:!0},teams:{type:Object,required:!0}},data(){return{teamImages:this.teams,bannerSrc:this.about.image,bannerTitle:this.about.title,missionTitle:this.about.mission_title,missionDescription:this.about.mission_description,visionTitle:this.about.vision_title,visionDescription:this.about.vision_description}}},rt={class:"w-full bg-black flex flex-col justify-center"},pt={class:"w-full mx-auto"};function dt(a,n,e,p,i,d){const c=u("Head"),_=u("AboutBannerSection"),b=u("AboutTeamSection"),f=u("Layout");return o(),l(g,null,[x(c,null,{default:m(()=>n[0]||(n[0]=[t("title",null,"About Us",-1)])),_:1}),x(f,null,{default:m(()=>[t("div",rt,[t("main",pt,[x(_,{bannerSrc:i.bannerSrc,bannerTitle:i.bannerTitle,missionTitle:i.missionTitle,missionDescription:i.missionDescription,visionTitle:i.visionTitle,visionDescription:i.visionDescription},null,8,["bannerSrc","bannerTitle","missionTitle","missionDescription","visionTitle","visionDescription"]),x(b,{title:e.about.team_title,teamImages:i.teamImages},null,8,["title","teamImages"])])])]),_:1})],64)}const mt=r(ct,[["render",dt],["__scopeId","data-v-d4f7ed32"]]);export{mt as default};
