"use strict";(self.webpackChunkupiterAng=self.webpackChunkupiterAng||[]).push([[466],{3466:(f,d,i)=>{i.r(d),i.d(d,{AdminModule:()=>a});var u=i(6895),o=i(246),n=i(1571);const m=function(){return["/admin","main"]},s=function(){return["/admin","auth-block"]};class r{constructor(e){this.router=e}logout(e){e.preventDefault(),this.router.navigate(["/admin","login"])}}r.\u0275fac=function(e){return new(e||r)(n.Y36(o.F0))},r.\u0275cmp=n.Xpm({type:r,selectors:[["app-admin-layout"]],decls:17,vars:4,consts:[[1,"layout"],[1,"header"],[1,"header__title"],[1,"spacer"],[1,"header__nav"],["routerLinkActive","active",1,"a",3,"routerLink"],["href","#",1,"a",3,"click"],[1,"container"]],template:function(e,p){1&e&&(n.TgZ(0,"div",0)(1,"div",1)(2,"div",2),n._uU(3,"Admin Panel"),n.qZA(),n._UZ(4,"div",3),n.TgZ(5,"ul",4)(6,"li")(7,"a",5),n._uU(8,"Main"),n.qZA()(),n.TgZ(9,"li")(10,"a",5),n._uU(11,"Login"),n.qZA()(),n.TgZ(12,"li")(13,"a",6),n.NdJ("click",function(g){return p.logout(g)}),n._uU(14,"Exit"),n.qZA()()()(),n.TgZ(15,"main",7),n._UZ(16,"router-outlet"),n.qZA()()),2&e&&(n.xp6(7),n.Q6J("routerLink",n.DdM(2,m)),n.xp6(3),n.Q6J("routerLink",n.DdM(3,s)))},dependencies:[o.lC,o.rH,o.Od],styles:[".layout[_ngcontent-%COMP%]{border-right:15px solid var(--header_color);border-left:15px solid var(--header_color);display:flex;flex-direction:column;min-height:100vh;max-width:1940px;margin:0 auto;background-color:var(--main_color);font-family:Roboto,Times New Roman,Arial,sans-serif;font-size:var(--font_size)}.header[_ngcontent-%COMP%]{display:flex;align-items:center;padding:0 40px;height:100px;border:1px solid black;background-color:#ab2430}.header__title[_ngcontent-%COMP%]{font-size:50px}.header__nav[_ngcontent-%COMP%]{display:flex;list-style-type:none;gap:16px;font-size:35px}.container[_ngcontent-%COMP%]{padding:20px;flex:1 1 auto}.a[_ngcontent-%COMP%]{color:#fff;text-decoration:none}.a[_ngcontent-%COMP%]:hover{color:#4f5050}.a[_ngcontent-%COMP%]:active{color:#3dd5f3}.active[_ngcontent-%COMP%]{color:#2a4769}"]});class c{}c.\u0275fac=function(e){return new(e||c)},c.\u0275cmp=n.Xpm({type:c,selectors:[["app-auth-block-page"]],decls:2,vars:0,template:function(e,p){1&e&&(n.TgZ(0,"p"),n._uU(1,"login-page works!"),n.qZA())}});class l{}l.\u0275fac=function(e){return new(e||l)},l.\u0275cmp=n.Xpm({type:l,selectors:[["app-main-page"]],decls:2,vars:0,template:function(e,p){1&e&&(n.TgZ(0,"p"),n._uU(1,"main-page works!"),n.qZA())}});class a{}a.\u0275fac=function(e){return new(e||a)},a.\u0275mod=n.oAB({type:a}),a.\u0275inj=n.cJS({imports:[u.ez,o.Bz.forChild([{path:"",component:r,children:[{path:"",redirectTo:"/admin/auth-block",pathMatch:"full"},{path:"login",component:c},{path:"main",component:l}]}]),o.Bz]})}}]);