webpackJsonp([2],{"C+AL":function(e,t){},Vmam:function(e,t,s){e.exports=s.p+"static/img/timg.fd8445c.jpg"},qiPF:function(e,t,s){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var a=s("3Js1"),r=s("oUFN"),n={components:{fontedHeader:a.a,fontedFooter:r.a},data:function(){return{information:[],message:{name:"",email:"",comment:""},rules:{name:[{required:!0,message:"请输入至少两位",trigger:"blur"},{min:2,max:5,message:"长度在 2 到 5 个字符",trigger:"blur"}],email:[{type:"email",required:!0,message:"请输入正确的邮箱",trigger:"blur"}],comment:[{required:!0,message:"请输入留言内容",trigger:"blur"},{min:2,max:100,message:"请填写多一点哟",trigger:"blur"}]}}},methods:{getData:function(){var e=this;this.$axiosPost({url:"api/Admins/query_message",resolve:function(t){1==t.status?e.information=t.data:e.$message({message:"获取个人信息出错啦-_-！"})}})},addMessage:function(){var e=this;this.$refs.ruleform.validate(function(t){t&&e.$axiosPost({url:"api/Index/leaving_message",params:e.message,resolve:function(t){1==t.status?(e.$message({message:"感谢你的留言,2S后返回主页。",type:"success"}),setTimeout(function(){e.$router.push("index")},2e3)):e.$message({message:t.point,type:"warning"})}})})}},created:function(){this.getData()}},i={render:function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"contact-wrap"},[a("fonted-header"),e._v(" "),a("div",{staticClass:"content"},[a("img",{attrs:{src:s("Vmam"),alt:""}}),e._v(" "),a("div",{staticClass:"item"},[a("el-form",{ref:"ruleform",attrs:{model:e.message,rules:e.rules}},[a("el-form-item",[a("el-row",{attrs:{gutter:40}},[a("el-col",{attrs:{span:12}},[a("el-form-item",{attrs:{prop:"name"}},[a("el-input",{attrs:{placeholder:"Name"},model:{value:e.message.name,callback:function(t){e.$set(e.message,"name",t)},expression:"message.name"}})],1)],1),e._v(" "),a("el-col",{attrs:{span:12}},[a("el-form-item",{attrs:{prop:"email"}},[a("el-input",{attrs:{placeholder:"Emali"},model:{value:e.message.email,callback:function(t){e.$set(e.message,"email",t)},expression:"message.email"}})],1)],1)],1),e._v(" "),a("el-row",{staticStyle:{"margin-top":"40px"}},[a("el-col",{attrs:{span:24}},[a("el-form-item",{attrs:{prop:"comment"}},[a("el-input",{attrs:{type:"textarea",autosize:{minRows:5,maxRows:8},placeholder:"Message"},model:{value:e.message.comment,callback:function(t){e.$set(e.message,"comment",t)},expression:"message.comment"}})],1)],1)],1)],1)],1),e._v(" "),a("el-button",{attrs:{type:"danger"},on:{click:e.addMessage}},[e._v("给他留言")])],1),e._v(" "),a("div",{staticClass:"item"},[a("h2",[e._v("Information")]),e._v(" "),a("ul",e._l(e.information,function(t){return a("li",[e._v(e._s(t.key)+":"+e._s(t.value))])}))])]),e._v(" "),a("fonted-footer")],1)},staticRenderFns:[]};var m=s("VU/8")(n,i,!1,function(e){s("C+AL")},"data-v-406ac888",null);t.default=m.exports}});
//# sourceMappingURL=2.b1b1dd3173fafd21a758.js.map