/* jce - 2.9.37 | 2023-05-24 | https://www.joomlacontenteditor.net | Copyright (C) 2006 - 2023 Ryan Demmer. All rights reserved | GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html */
!function($,tinyMCEPopup){function getAttributes(node){var i,ed=tinyMCEPopup.editor,attrs=node.attributes,attribs={};for(i=attrs.length-1;i>=0;i--){var name=attrs[i].name,value=ed.dom.getAttrib(node,name);"_"!==name.charAt(0)&&name.indexOf("-mce-")===-1&&(attribs[name]=value)}return attribs}var anchorElm,currNode,emailRex=/(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})/,toggleTargetRules=function(rel,isUnsafe){var rules=["noopener"],newRel=rel?rel.split(/\s+/):[],toString=function(rel){return $.trim(rel.sort().join(" "))},addTargetRules=function(rel){return rel=removeTargetRules(rel),rel.length?rel.concat(rules):rules},removeTargetRules=function(rel){return rel.filter(function(val){return $.inArray(val,rules)===-1})};return newRel=isUnsafe?addTargetRules(newRel):removeTargetRules(newRel),newRel.length?toString(newRel):null},LinkDialog={settings:{},init:function(){function setText(state,txt){state?$("#text").val(txt).attr("disabled",!1).trigger("change"):$("#text").val("").attr("disabled",!0).trigger("change")}var el,self=this,ed=tinyMCEPopup.editor,se=ed.selection,api=ed.plugins.link;tinyMCEPopup.restoreSelection(),$("button#insert").on("click",function(e){self.insert(),e.preventDefault()}),this.settings.file_browser||$("#href").removeClass("browser"),$(".email").on("click",function(e){e.preventDefault(),LinkDialog.createEmail()}),$("#anchor_container").html(this.getAnchorListHTML("anchor","href")),$("#link-browser").tree({collapseTree:!0,charLength:50}).on("tree:nodeclick",function(e,evt,node){if($(evt.target).is("button.link-preview")){e.preventDefault(),e.stopImmediatePropagation();var url=$(node).attr("data-id")||$(node).attr("id"),title=$(node).attr("aria-label");return url.indexOf("index.php")!==-1&&(url+="&tmpl=component",url=ed.documentBaseURI.toAbsolute(url,!0)),void Wf.Modal.iframe(title,url,{width:"100%",height:480})}if($(node).hasClass("folder")&&$(this).trigger("tree:togglenode",[e,node]),!$(node).hasClass("nolink")){var url=$("a",node).attr("href"),text=$("a",node).attr("title")||"";"#"==url&&(url=$(node).attr("data-id")||$(node).attr("id")),url=Wf.String.decode(url),text=$.trim(text.split("/")[0]),self.insertLink({url:url,text:text})}}).on("tree:nodeload",function(e,node){var self=this;$(this).trigger("tree:toggleloader",node);var id=$(node).attr("data-id")||$(node).attr("id"),query=Wf.String.query(Wf.String.unescape(id));Wf.JSON.request("getLinks",{json:query},function(o){if(o)if(o.error)Wf.Modal.alert(o.error);else{var ul=$("ul:first",node);ul&&$(ul).remove(),o.folders&&o.folders.length&&$(self).trigger("tree:createnode",[o.folders,node,!1]),$(node).find("li.file").not(".anchor").append('<button type="button" aria-label="'+ed.getLang("dlg.preview","Preview")+'" class="uk-button uk-button-link link-preview"><i class="uk-icon uk-icon-preview" role="presentation"></i></button>'),$(self).trigger("tree:togglenodestate",[node,!0])}$(self).trigger("tree:toggleloader",node)},self)}).trigger("tree:init"),$("#search-button").on("click",function(e){self._search(),e.preventDefault()}).button({icons:{primary:"uk-icon-search"}}),$("#search-clear").on("click",function(e){$(this).hasClass("uk-active")&&($(this).removeClass("uk-active"),$("#search-input").val(""),$("#search-result").empty().hide())}),$("#search-options-button").on("click",function(e){e.preventDefault(),$(this).hasClass("uk-active")?$(this).removeClass("uk-active"):$(this).addClass("uk-active");var $p=$("#search-options").parent();$("#search-options").height($p.parent().height()-$p.outerHeight()-15).toggle()}).on("close",function(){$(this).removeClass("uk-active"),$("#search-options").hide()}),$(el).on("change keyup",function(){""===this.value&&($("#search-result").empty().hide(),$("#search-clear").removeClass("uk-active"))}),$(window).on("keydown",function(e){13===e.keyCode&&$("#search-input").is(":focus")&&(self._search(),e.preventDefault(),e.stopPropagation())}),WFPopups.setup(),Wf.init(),$("#text").on("change",function(){$(this).data("text",this.value)}).data("text","");var state=api.isOnlyTextSelected(ed);if(currNode=se.getNode(),anchorElm=ed.dom.getParent(currNode,"a[href]"),api.isAnchor(anchorElm)){if(se.select(anchorElm),tinymce.isIE){var start=se.getStart(),end=se.getEnd();start===end&&"A"===start.nodeName&&(anchorElm=start)}api.hasFileSpan(anchorElm)&&(state=!0),$(".uk-button-text","#insert").text(tinyMCEPopup.getLang("update","Update",!0));var href=ed.convertURL(ed.dom.getAttrib(anchorElm,"href"));$("#href").val(href),$.each(["title","id","style","dir","lang","tabindex","accesskey","charset","hreflang","target"],function(i,k){$("#"+k).val(ed.dom.getAttrib(anchorElm,k))}),$("#rev").val(ed.dom.getAttrib(anchorElm,"rev"),!0),"#"==href.charAt(0)&&$("#anchor").val(href),$("#classes").val(function(){var values=ed.dom.getAttrib(anchorElm,"class");return $.trim(values)}).trigger("change");var data=WFPopups.getPopup(anchorElm)||{};$("#rel").val(function(){var v=data.rel;return"string"!==$.type(v)&&(v=ed.dom.getAttrib(anchorElm,"rel")),v?(v=$.trim(v),v=ed.dom.encode(v)):""}).trigger("change");var x=0,attribs=getAttributes(anchorElm);$.each(attribs,function(key,val){if("data-mouseover"===key||"data-mouseout"===key||0===key.indexOf("on"))return!0;if(document.getElementById(key)||"class"==key)return!0;try{val=decodeURIComponent(val)}catch(e){}var repeatable=$(".uk-repeatable").eq(0);x>0&&$(repeatable).clone(!0).appendTo($(repeatable).parent());var elements=$(".uk-repeatable").eq(x).find("input, select");$(elements).eq(0).val(key),$(elements).eq(1).val(val),x++})}else Wf.setDefaults(this.settings.defaults);var txt=api.getAnchorText(se,api.isAnchor(anchorElm)?anchorElm:null)||"";setText(state,txt),$.each(this.settings.attributes,function(k,v){0===parseInt(v,10)&&$("#attributes-"+k).hide()}),"html5"==ed.settings.schema&&ed.settings.validate&&$("#rev").parent().parent().hide(),$("select").datalist().trigger("datalist:update"),$(".uk-datalist").trigger("datalist:update"),$(".uk-repeatable").on("repeatable:delete",function(e,ctrl,elm){$(elm).find("input, select").eq(1).val("")}),window.focus()},getAnchorListHTML:function(id,target){var name,ed=tinyMCEPopup.editor,nodes=ed.dom.select(".mce-item-anchor"),html="";return html+='<select id="'+id+'" class="mceAnchorList" onchange="this.form.'+target+".value=",html+='this.options[this.selectedIndex].value;">',html+='<option value="">---</option>',$.each(nodes,function(i,n){"SPAN"==n.nodeName?name=ed.dom.getAttrib(n,"data-mce-name")||ed.dom.getAttrib(n,"id"):n.href||(name=ed.dom.getAttrib(n,"name")||ed.dom.getAttrib(n,"id")),name&&(html+='<option value="#'+name+'">'+name+"</option>")}),html+="</select>"},checkPrefix:function(n){var self=this,v=$(n).val();emailRex.test(v)&&!/^\s*mailto:/i.test(v)?Wf.Modal.confirm(tinyMCEPopup.getLang("link_dlg.is_email","The URL you entered seems to be an email address, do you want to add the required mailto: prefix?"),function(state){state&&$(n).val("mailto:"+v),self.insertAndClose()}):/^\s*www./i.test(v)?Wf.Modal.confirm(tinyMCEPopup.getLang("link_dlg.is_external","The URL you entered seems to be an external link, do you want to add the required https:// prefix?"),function(state){state&&$(n).val("https://"+v),self.insertAndClose()}):this.insertAndClose()},insert:function(){tinyMCEPopup.restoreSelection();var ed=tinyMCEPopup.editor;return""==$("#href").val()?(Wf.Modal.alert(ed.getLang("link_dlg.no_href","A URL is required. Please select a link or enter a URL"),{close:function(){$("#href").focus()}}),!1):ed.selection.isCollapsed()&&""==$("#text").not(":disabled").val()?(Wf.Modal.alert(ed.getLang("link_dlg.no_text","Please enter some text for the link"),{close:function(){$("#text").focus()}}),!1):this.checkPrefix($("#href"))},insertAndClose:function(){tinyMCEPopup.restoreSelection();var el,ed=tinyMCEPopup.editor,se=ed.selection,node=se.getNode(),args={},api=ed.plugins.link,attribs=["href","title","target","id","style","class","rel","rev","charset","hreflang","dir","lang","tabindex","accesskey","type"];tinymce.each(attribs,function(k){var v=$("#"+k).val();v=tinymce.trim(v),"href"==k&&(v=Wf.String.buildURI(v)),"class"==k&&(v=$("#classes").val()||"",v=$.trim(v)),args[k]=v}),$(".uk-repeatable").each(function(){var elements=$("input, select",this),key=$(elements).eq(0).val(),value=$(elements).eq(1).val();key&&(args[key]=value)}),ed.settings.allow_unsafe_link_target||(args.rel=toggleTargetRules(args.rel,"_blank"==args.target&&/:\/\//.test(args.href)));var txt=$("#text").val();if(se.isCollapsed())ed.execCommand("mceInsertContent",!1,'<a href="'+args.href+'" id="__mce_tmp">'+txt+"</a>",{skip_undo:1}),el=ed.dom.get("__mce_tmp"),ed.dom.setAttribs(el,args);else{api.isAnchor(node)?(ed.dom.setAttribs(node,{href:args.href,"data-mce-tmp":"1"}),txt&&api.updateTextContent(currNode||node,txt)):ed.execCommand("mceInsertLink",!1,{href:args.href,"data-mce-tmp":"1"},{skip_undo:1}),ed.dom.setAttrib(node,"style",ed.dom.getAttrib(node,"data-mce-style"));var elms=ed.dom.select("a[data-mce-tmp]");args["data-mce-tmp"]=null,tinymce.each(elms,function(elm,i){ed.dom.setAttribs(elm,args),i>0&&args.id&&ed.dom.setAttrib(elm,"id","")}),elms.length&&(el=elms[0])}txt&&(ed.selection.select(el),ed.selection.collapse(0)),el=el||node,WFPopups.createPopup(el),ed.undoManager.add(),ed.nodeChanged(),tinyMCEPopup.close()},setClasses:function(v){Wf.setClasses(v)},setTargetList:function(v){$("#target").val(v)},setClassList:function(v){$("#classlist").val(v)},insertLink:function(args){var url=tinyMCEPopup.editor.documentBaseURI.toRelative(args.url);$("#href").val(url),""!=$("#text").data("text")||$("#text").prop("disabled")||$("#text").val(args.text)},createEmail:function(){var ed=tinyMCEPopup.editor,fields='<div class="uk-form-horizontal">';$.each(["mailto","cc","bcc","subject","body"],function(i,name){fields+='<div class="uk-form-row uk-grid uk-grid-collapse">   <label class="uk-form-label uk-width-3-10" for="email_'+name+'">'+ed.getLang("link_dlg."+name,name)+'</label>   <div class="uk-form-controls uk-width-7-10">       <textarea id="email_'+name+'"></textarea>   </div></div>'}),fields+="</div>",Wf.Modal.open(ed.getLang("link_dlg.email","Create E-Mail Address"),{width:300,open:function(){var v=$("#href").val();if(v&&emailRex.test(v)){var parts=v.replace(/\?/,"&").replace(/\&amp;/g,"&").split("&"),address=parts.shift();$("#email_mailto").val(address.replace(/^mailto\:/,"")),$.each(parts,function(i,s){var k=s.split("=");if(2===k.length){var val=k[1];try{val=decodeURIComponent(val)}catch(e){}$("#email_"+k[0]).val(val)}})}},buttons:[{text:ed.getLang("link_dlg.create_email","Create Email"),click:function(){var args=[],errors=0;$.each(["mailto","cc","bcc","subject","body"],function(i,key){var val=$("#email_"+key).val();val&&(val=val.replace(/\n\r/g,""),$.each(val.split(","),function(i,str){if(/^(mailto|cc|bcc)$/.test(key)&&!/@/.test(str)){var msg=ed.getLang("link_dlg.invalid_email","%s is not a valid e-mail address!");Wf.Modal.alert(msg.replace(/%s/,ed.dom.encode(str))),errors++}}),/^(subject|body)$/.test(key)&&(val=encodeURIComponent(val)),args.push("mailto"==key?val:key+"="+val))}),0===errors&&(args.length&&$("#href").val("mailto:"+args.join("&").replace(/&/,"?")),$(this).trigger("modal.close"))},attributes:{class:"uk-button-primary"},icon:"uk-icon-check"},{text:ed.getLang("dlg.cancel","Cancel"),icon:"uk-icon-close",attributes:{class:"uk-modal-close"}}]},fields)},openHelp:function(){Wf.help("link")},_search:function(){var self=this,$p=$("#search-result").parent(),query=$("#search-input").val();query&&!$("#search-input").hasClass("placeholder")&&($("#search-clear").removeClass("uk-active"),$("#search-browser").addClass("loading"),query=$.trim(query.replace(/[\///<>#]/g,"")),Wf.JSON.request("doSearch",{json:[query]},function(results){if(results&&!results.error)$("#search-result").empty(),results.length&&($.each(results,function(i,values){$.each(values,function(name,items){$('<h3 class="uk-margin-top uk-margin-left uk-text-bold">'+name+"</h3>").appendTo("#search-result"),$.each(items,function(i,item){var $dl=$('<dl class="uk-margin-small" />').appendTo("#search-result");$('<dt class="link uk-margin-small" />').text(item.title).on("click",function(){var url=item.link,text=item.title;url=Wf.String.decode(url),text=$.trim(text.split("/")[0]),self.insertLink({url:url,text:text})}).prepend('<i class="uk-icon uk-icon-file-text uk-margin-small-right" />').appendTo($dl),$('<dd class="text">'+item.text+"</dd>").appendTo($dl),item.anchors&&$.each(item.anchors,function(i,a){$('<dd class="anchor"><i role="presentation" class="uk-icon uk-icon-anchor uk-margin-small-right"></i>#'+a+"</dd>").on("click",function(){var url=Wf.String.decode(item.link)+"#"+a;self.insertLink({url:url,text:a})}).appendTo($dl)})})})}),$("dl:odd","#search-result").addClass("odd")),$("#search-options-button").trigger("close"),$("#search-result").height($p.parent().height()-$p.outerHeight()-5).show();else{var error=results?results.error:"The server return an invalid response";Wf.Modal.alert(error)}$("#search-browser").removeClass("loading"),$("#search-clear").addClass("uk-active")},self))}};window.LinkDialog=LinkDialog,tinyMCEPopup.onInit.add(LinkDialog.init,LinkDialog)}(jQuery,tinyMCEPopup);