import{i as l,b as c,o as r,e as i,w as d,a as o,t as p,n as b}from"./app-BnxJCrdW.js";import{_ as g}from"./Layout-BPiLRXrW.js";const u={components:{Link:l},name:"BlogItem",props:{blog:Object},computed:{truncatedDetails(){const t=(this.blog.details||"").replace(/<[^>]*>/g,"");return t.length>150?t.substring(0,150)+"...":t}}},_={class:"absolute bottom-0 w-full backdrop-blur-sm p-4"},m={class:"title bold text-[min(60px,8.3vw)] lg:text-[26px] tracking-[4.5px] text-black"},x=["innerHTML"];function f(s,t,e,h,k,n){const a=c("Link");return r(),i(a,{href:s.route("frontend.blog.detail",`${e.blog.slug}`)},{default:d(()=>[o("div",{class:"w-full h-[346px] bg-center bg-cover relative",style:b({backgroundImage:`url(${e.blog.image})`})},[o("div",_,[o("h1",m,p(e.blog.title),1),o("p",{class:"description font-bold text-[16px] text-black",innerHTML:n.truncatedDetails},null,8,x)])],4)]),_:1},8,["href"])}const w=g(u,[["render",f],["__scopeId","data-v-37e079c9"]]);export{w as B};
