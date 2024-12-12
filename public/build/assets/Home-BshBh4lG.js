import{_ as d,L as C}from"./Layout-AI2RQ0a4.js";import{o as l,c as a,a as t,i as f,b as s,t as o,d as u,w as g,F as h,r as D,Z as b,e as x,f as p}from"./app-DrVioOY4.js";import{S as U}from"./ServiceIconBox-BOXqxptu.js";const I={props:{banner_image:{type:String,required:!0}},name:"SliderSection"},L={class:"relative bg-black w-full max-w-[1920px] text-white flex flex-col mx-auto pb-[min(227px,31.5vw)] lg:pb-0 overflow-hidden"},B={class:"h-full relative w-full object-cover lg:aspect-video"},j={class:"relative w-full h-full cover-image overflow-hidden lg:overflow-visible"},z=["src"],H=["src"],T={class:"absolute z-10 left-[-22%] top-[-4.5vh] lg:left-auto lg:right-0 lg:top-[-200px] w-[75%] lg:w-auto"},K=["src"],q={class:"hidden lg:block absolute z-10 right-[50%] bottom-[130px]"},M=["src"],A={class:"block lg:hidden absolute z-10 right-[-22%] bottom-[-8.5vh] w-[75%] lg:w-auto"},F=["src"];function E(n,r,e,_,c,m){return l(),a("section",L,[t("div",B,[t("div",j,[t("img",{src:e.banner_image,alt:"Banner Mobile",class:"block lg:hidden w-full object-cover",loading:"lazy"},null,8,z),t("img",{src:e.banner_image,alt:"Banner Desktop",class:"hidden lg:block absolute top-0 left-1/2 transform -translate-x-1/2 lg:w-full object-cover",loading:"lazy"},null,8,H),t("div",T,[t("img",{alt:"Slats",loading:"lazy",width:"644",height:"410",decoding:"async",style:{color:"transparent"},src:n.asset("assets/images/Slats.png")},null,8,K)]),t("div",q,[t("img",{alt:"Slats",loading:"lazy",width:"644",height:"410",decoding:"async",style:{color:"transparent"},src:n.asset("assets/images/Slats.png")},null,8,M)])]),t("div",A,[t("img",{alt:"Slats",loading:"lazy",width:"644",height:"410",decoding:"async",style:{color:"transparent"},src:n.asset("assets/images/Slats.png")},null,8,F)])])])}const N=d(I,[["render",E]]),O={props:{content:{type:Object,required:!0}},name:"AboutUsSection",components:{Link:f}},V={class:"w-full bg-white text-black py-[min(184px,25.5vw)] lg:py-[100px] flex flex-col"},Z={class:"flex flex-col lg:flex-row mx-auto w-full px-[min(14%,104px)] lg:px-[min(4%,104px)]",style:{"max-width":"1480px"}},G={class:"w-full lg:w-[45%]"},J={class:"font-Calibri font-bold tracking-widest text-[min(52px,7.2vw)] lg:text-[58px] mb-10"},P={class:"w-full lg:w-[55%]"},Q={class:"text-[min(28px,3.88vw)] lg:text-[22px] flex flex-col gap-7 mb-16"},R={class:"border-y-4 border-x-0 border-[#EF89C1] border-solid text-[18px] font-Calibri tracking-[2.5px] uppercase px-[24.5px] py-[18.5px] relative overflow-hidden animatedButton"};function W(n,r,e,_,c,m){const i=s("Link");return l(),a("section",V,[t("div",Z,[t("div",G,[t("h2",J,o(e.content.about_title.toUpperCase()),1)]),t("div",P,[t("div",Q,o(e.content.about_description),1),u(i,{href:n.route("frontend.about")},{default:g(()=>[t("button",R,o(e.content.about_btn_text.toUpperCase()),1)]),_:1},8,["href"])])])])}const X=d(O,[["render",W]]),Y={props:{client_title:{type:String,required:!0},clients:{type:Object,required:!0}},name:"ClientsSection"},tt={class:"w-full bg-white text-black py-[min(121px,16.8vw)] lg:py-44 flex flex-col px-[min(14%,104px)] lg:px-[min(4%,104px)]"},et={class:"flex flex-col mx-auto w-full max-w-[1480px]"},nt={class:"font-Calibri font-bold tracking-widest text-[min(52px,7.2vw)] xl:text-[58px] mb-28"},ot={class:"w-full grid grid-cols-2 xl:grid-cols-3 gap-20 lg:gap-40 items-center"},lt=["alt","src"];function it(n,r,e,_,c,m){return l(),a("section",tt,[t("div",et,[t("h2",nt,o(e.client_title.toUpperCase()),1),t("div",ot,[(l(!0),a(h,null,D(e.clients,i=>(l(),a("div",{key:i.id,class:"w-full max-w-[296px] relative block justify-center"},[t("img",{alt:"Logo "+i.id,src:i.image,class:"block"},null,8,lt)]))),128))])])])}const st=d(Y,[["render",it]]),ct={components:{Link:f},props:{content:{type:Object,required:!0}},name:"ContactSection",data(){return{address:this.$page.props.setting.office_address,email:this.$page.props.setting.email}}},at={class:"w-full bg-black text-white py-[min(121px,16.8vw)] lg:py-14 flex flex-col px-[min(14%,104px)] lg:px-[min(4%,104px)]"},rt={class:"flex flex-col mx-auto w-full max-w-[1480px]"},dt={class:"font-Calibri font-bold tracking-widest text-[min(52px,7.2vw)] xl:text-[58px] mb-28"},_t={class:"w-full max-w-[1036px] flex flex-col lg:mx-auto lg:flex-row"},mt={class:"flex flex-col gap-7 mb-[min(114px,15.8vw)] lg:mb-16 w-full xl:w-1/2 pr-0 lg:pr-2.5"},pt={class:"font-Calibri font-light tracking-widest text-[min(48px,6.66vw)] xl:text-[48px]"},xt={class:"text-[min(26px,3.61vw)] xl:text-[22px] mb-[min(114px,15.8vw)] lg:my-11"},ut={class:"border-y-4 border-x-0 border-[#EF89C1] border-solid text-[18px] font-Calibri tracking-[2.5px] uppercase px-[24.5px] py-[18.5px] relative overflow-hidden animatedButton"},gt={class:"py-16 lg:py-0 border-t-2 border-l-0 lg:border-l-2 lg:border-t-0 pl-0 lg:pl-[20%] xl:pl-32 border-white border-solid flex flex-col gap-7 mb-[min(114px,15.8vw)] lg:mb-16 w-full xl:w-1/2"},ft={class:"font-Calibri font-light tracking-widest text-[min(48px,6.66vw)] xl:text-[48px]"},ht={class:"flex flex-col mb-[min(114px,15.8vw)] lg:my-11 text-[min(26px,3.61vw)] xl:text-[22px]"},bt=["href"],wt={class:"text-[22px] underline"};function vt(n,r,e,_,c,m){const i=s("Link");return l(),a("section",at,[t("div",rt,[t("h2",dt,o(e.content.contact_title.toUpperCase()),1),t("div",_t,[t("div",mt,[t("h2",pt,o(e.content.contact_subtitle.toUpperCase()),1),t("p",xt,o(e.content.contact_description),1),u(i,{href:n.route("frontend.contact")},{default:g(()=>[t("button",ut,o(e.content.contact_btn_text.toUpperCase()),1)]),_:1},8,["href"])]),t("div",gt,[t("h2",ft,o(e.content.contact_address_title),1),t("div",ht,[t("p",null,o(c.address),1)]),t("a",{href:`mailto:${c.email}`},[t("p",wt,o(c.email),1)],8,bt)])])])])}const yt=d(ct,[["render",vt]]),St={components:{Head:b},name:"MetaInfo",props:{title:{type:String,default:"Default title for the site."},metaTitle:{type:String,default:null},metaDescription:{type:String,default:null},metaKeywords:{type:String,default:null},ogImage:{type:String,default:null},ogUrl:{type:String,default:()=>window.location.href}},computed:{finalTitle(){var n;return this.metaTitle||((n=this.$page.props.setting)==null?void 0:n.meta_title)||this.title},metaDescriptionComputed(){var n;return this.metaDescription||((n=this.$page.props.setting)==null?void 0:n.meta_description)||"Default description for the site."},metaKeywordsComputed(){var n;return this.metaKeywords||((n=this.$page.props.setting)==null?void 0:n.meta_keywords)||"default, keywords"},ogImageComputed(){var n;return this.ogImage||((n=this.$page.props.setting)==null?void 0:n.og_image)||"/default-image.jpg"},ogUrlComputed(){return this.ogUrl||window.location.href}}},kt=["content"],$t=["content"],Ct=["content"],Dt=["content"],Ut=["content"],It=["content"];function Lt(n,r,e,_,c,m){const i=s("Head");return l(),x(i,null,{default:g(()=>[t("title",null,o(e.metaTitle),1),t("meta",{name:"description",content:e.metaDescription},null,8,kt),t("meta",{name:"keywords",content:e.metaKeywords},null,8,$t),t("meta",{property:"og:title",content:e.metaTitle},null,8,Ct),t("meta",{property:"og:description",content:e.metaDescription},null,8,Dt),t("meta",{property:"og:image",content:e.ogImage},null,8,Ut),r[0]||(r[0]=t("meta",{property:"og:type",content:"website"},null,-1)),t("meta",{property:"og:url",content:e.ogUrl},null,8,It)]),_:1})}const Bt=d(St,[["render",Lt]]),jt={props:["content","clients","services","activeService","metaData"],name:"Home",components:{ServiceIconBox:U,Layout:C,SliderSection:N,AboutUsSection:X,ClientsSection:st,ContactSection:yt,Head:b,MetaInfo:Bt}},zt={class:"w-full bg-black flex flex-col justify-center"},Ht={class:"w-full mx-auto"},Tt={key:2,class:"w-full relative bg-black text-white lg:pt-[10px] pb-20 md:pb-22 flex flex-col z-[0]"},Kt={class:"flex flex-col mx-auto w-full px-[min(14%,104px)] lg:px-[min(4%,104px)] mt-10"},qt={class:"font-Calibri font-bold tracking-widest text-center text-[min(32px,7.2vw)] xl:text-[40px] mb-10"},Mt={class:"grid grid-cols-1 lg:grid-cols-2 gap-4 gap-y-14 items-start justify-center"};function At(n,r,e,_,c,m){const i=s("MetaInfo"),w=s("SliderSection"),v=s("AboutUsSection"),y=s("ServiceIconBox"),S=s("ClientsSection"),k=s("ContactSection"),$=s("Layout");return l(),a(h,null,[u(i,{title:n.Home,metaTitle:e.metaData.title,metaDescription:e.metaData.description,metaKeywords:e.metaData.keywords,ogImage:e.metaData.image},null,8,["title","metaTitle","metaDescription","metaKeywords","ogImage"]),u($,null,{default:g(()=>[t("div",zt,[t("main",Ht,[e.content.banner_section===1?(l(),x(w,{key:0,banner_image:e.content.banner_video},null,8,["banner_image"])):p("",!0),e.content.about_section===1?(l(),x(v,{key:1,content:e.content},null,8,["content"])):p("",!0),e.content.service_section===1?(l(),a("section",Tt,[t("div",Kt,[t("h2",qt,o(e.content.service_title.toUpperCase()),1),t("div",Mt,[u(y,{services:e.services,activeService:e.activeService},null,8,["services","activeService"])])])])):p("",!0),e.content.client_section===1?(l(),x(S,{key:3,client_title:e.content.client_title,clients:e.clients},null,8,["client_title","clients"])):p("",!0),e.content.contact_section===1?(l(),x(k,{key:4,content:e.content},null,8,["content"])):p("",!0)])])]),_:1})],64)}const Ot=d(jt,[["render",At]]);export{Ot as default};
