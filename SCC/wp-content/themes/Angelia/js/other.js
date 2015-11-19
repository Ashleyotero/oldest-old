/*!
 * jCarousel - Riding carousels with jQuery
 *   http://sorgalla.com/jcarousel/
 *
 * Copyright (c) 2006 Jan Sorgalla (http://sorgalla.com)
 * Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
 * and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
 *
 * Built on top of the jQuery library
 *   http://jquery.com
 *
 * Inspired by the "Carousel Component" by Bill Scott
 *   http://billwscott.com/carousel/
 */

(function($){$.fn.jcarousel=function(o){if(typeof o=='string'){var instance=$(this).data('jcarousel'),args=Array.prototype.slice.call(arguments,1);return instance[o].apply(instance,args);}else
return this.each(function(){$(this).data('jcarousel',new $jc(this,o));});};var defaults={vertical:false,start:1,offset:1,size:null,scroll:3,visible:null,animation:'normal',easing:'swing',auto:0,wrap:null,initCallback:null,reloadCallback:null,itemLoadCallback:null,itemFirstInCallback:null,itemFirstOutCallback:null,itemLastInCallback:null,itemLastOutCallback:null,itemVisibleInCallback:null,itemVisibleOutCallback:null,buttonNextHTML:'<div></div>',buttonPrevHTML:'<div></div>',buttonNextEvent:'click',buttonPrevEvent:'click',buttonNextCallback:null,buttonPrevCallback:null};$.jcarousel=function(e,o){this.options=$.extend({},defaults,o||{});this.locked=false;this.container=null;this.clip=null;this.list=null;this.buttonNext=null;this.buttonPrev=null;this.wh=!this.options.vertical?'width':'height';this.lt=!this.options.vertical?'left':'top';var skin='',split=e.className.split(' ');for(var i=0;i<split.length;i++){if(split[i].indexOf('jcarousel-skin')!=-1){$(e).removeClass(split[i]);skin=split[i];break;}}if(e.nodeName=='UL'||e.nodeName=='OL'){this.list=$(e);this.container=this.list.parent();if(this.container.hasClass('jcarousel-clip')){if(!this.container.parent().hasClass('jcarousel-container'))this.container=this.container.wrap('<div></div>');this.container=this.container.parent();}else if(!this.container.hasClass('jcarousel-container'))this.container=this.list.wrap('<div></div>').parent();}else{this.container=$(e);this.list=this.container.find('ul,ol').eq(0);}if(skin!=''&&this.container.parent()[0].className.indexOf('jcarousel-skin')==-1)this.container.wrap('<div class=" '+skin+'"></div>');this.clip=this.list.parent();if(!this.clip.length||!this.clip.hasClass('jcarousel-clip'))this.clip=this.list.wrap('<div></div>').parent();this.buttonNext=$('.jcarousel-next',this.container);if(this.buttonNext.size()==0&&this.options.buttonNextHTML!=null)this.buttonNext=this.clip.after(this.options.buttonNextHTML).next();this.buttonNext.addClass(this.className('jcarousel-next'));this.buttonPrev=$('.jcarousel-prev',this.container);if(this.buttonPrev.size()==0&&this.options.buttonPrevHTML!=null)this.buttonPrev=this.clip.after(this.options.buttonPrevHTML).next();this.buttonPrev.addClass(this.className('jcarousel-prev'));this.clip.addClass(this.className('jcarousel-clip')).css({overflow:'hidden',position:'relative'});this.list.addClass(this.className('jcarousel-list')).css({overflow:'hidden',position:'relative',top:0,left:0,margin:0,padding:0});this.container.addClass(this.className('jcarousel-container')).css({position:'relative'});var di=this.options.visible!=null?Math.ceil(this.clipping()/this.options.visible):null;var li=this.list.children('li');var self=this;if(li.size()>0){var wh=0,i=this.options.offset;li.each(function(){self.format(this,i++);wh+=self.dimension(this,di);});this.list.css(this.wh,wh+'px');if(!o||o.size===undefined)this.options.size=li.size();}this.container.css('display','block');this.buttonNext.css('display','block');this.buttonPrev.css('display','block');this.funcNext=function(){self.next();};this.funcPrev=function(){self.prev();};this.funcResize=function(){self.reload();};if(this.options.initCallback!=null)this.options.initCallback(this,'init');if($.browser.safari){this.buttons(false,false);$(window).bind('load.jcarousel',function(){self.setup();});}else
this.setup();};var $jc=$.jcarousel;$jc.fn=$jc.prototype={jcarousel:'0.2.4'};$jc.fn.extend=$jc.extend=$.extend;$jc.fn.extend({setup:function(){this.first=null;this.last=null;this.prevFirst=null;this.prevLast=null;this.animating=false;this.timer=null;this.tail=null;this.inTail=false;if(this.locked)return;this.list.css(this.lt,this.pos(this.options.offset)+'px');var p=this.pos(this.options.start);this.prevFirst=this.prevLast=null;this.animate(p,false);$(window).unbind('resize.jcarousel',this.funcResize).bind('resize.jcarousel',this.funcResize);},reset:function(){this.list.empty();this.list.css(this.lt,'0px');this.list.css(this.wh,'10px');if(this.options.initCallback!=null)this.options.initCallback(this,'reset');this.setup();},reload:function(){if(this.tail!=null&&this.inTail)this.list.css(this.lt,$jc.intval(this.list.css(this.lt))+this.tail);this.tail=null;this.inTail=false;if(this.options.reloadCallback!=null)this.options.reloadCallback(this);if(this.options.visible!=null){var self=this;var di=Math.ceil(this.clipping()/this.options.visible),wh=0,lt=0;$('li',this.list).each(function(i){wh+=self.dimension(this,di);if(i+1<self.first)lt=wh;});this.list.css(this.wh,wh+'px');this.list.css(this.lt,-lt+'px');}this.scroll(this.first,false);},lock:function(){this.locked=true;this.buttons();},unlock:function(){this.locked=false;this.buttons();},size:function(s){if(s!=undefined){this.options.size=s;if(!this.locked)this.buttons();}return this.options.size;},has:function(i,i2){if(i2==undefined||!i2)i2=i;if(this.options.size!==null&&i2>this.options.size)i2=this.options.size;for(var j=i;j<=i2;j++){var e=this.get(j);if(!e.length||e.hasClass('jcarousel-item-placeholder'))return false;}return true;},get:function(i){return $('.jcarousel-item-'+i,this.list);},add:function(i,s){var e=this.get(i),old=0,add=0;if(e.length==0){var c,e=this.create(i),j=$jc.intval(i);while(c=this.get(--j)){if(j<=0||c.length){j<=0?this.list.prepend(e):c.after(e);break;}}}else
old=this.dimension(e);e.removeClass(this.className('jcarousel-item-placeholder'));typeof s=='string'?e.html(s):e.empty().append(s);var di=this.options.visible!=null?Math.ceil(this.clipping()/this.options.visible):null;var wh=this.dimension(e,di)-old;if(i>0&&i<this.first)this.list.css(this.lt,$jc.intval(this.list.css(this.lt))-wh+'px');this.list.css(this.wh,$jc.intval(this.list.css(this.wh))+wh+'px');return e;},remove:function(i){var e=this.get(i);if(!e.length||(i>=this.first&&i<=this.last))return;var d=this.dimension(e);if(i<this.first)this.list.css(this.lt,$jc.intval(this.list.css(this.lt))+d+'px');e.remove();this.list.css(this.wh,$jc.intval(this.list.css(this.wh))-d+'px');},next:function(){this.stopAuto();if(this.tail!=null&&!this.inTail)this.scrollTail(false);else
this.scroll(((this.options.wrap=='both'||this.options.wrap=='last')&&this.options.size!=null&&this.last==this.options.size)?1:this.first+this.options.scroll);},prev:function(){this.stopAuto();if(this.tail!=null&&this.inTail)this.scrollTail(true);else
this.scroll(((this.options.wrap=='both'||this.options.wrap=='first')&&this.options.size!=null&&this.first==1)?this.options.size:this.first-this.options.scroll);},scrollTail:function(b){if(this.locked||this.animating||!this.tail)return;var pos=$jc.intval(this.list.css(this.lt));!b?pos-=this.tail:pos+=this.tail;this.inTail=!b;this.prevFirst=this.first;this.prevLast=this.last;this.animate(pos);},scroll:function(i,a){if(this.locked||this.animating)return;this.animate(this.pos(i),a);},pos:function(i){var pos=$jc.intval(this.list.css(this.lt));if(this.locked||this.animating)return pos;if(this.options.wrap!='circular')i=i<1?1:(this.options.size&&i>this.options.size?this.options.size:i);var back=this.first>i;var f=this.options.wrap!='circular'&&this.first<=1?1:this.first;var c=back?this.get(f):this.get(this.last);var j=back?f:f-1;var e=null,l=0,p=false,d=0,g;while(back?--j>=i:++j<i){e=this.get(j);p=!e.length;if(e.length==0){e=this.create(j).addClass(this.className('jcarousel-item-placeholder'));c[back?'before':'after'](e);if(this.first!=null&&this.options.wrap=='circular'&&this.options.size!==null&&(j<=0||j>this.options.size)){g=this.get(this.index(j));if(g.length)this.add(j,g.children().clone(true));}}c=e;d=this.dimension(e);if(p)l+=d;if(this.first!=null&&(this.options.wrap=='circular'||(j>=1&&(this.options.size==null||j<=this.options.size))))pos=back?pos+d:pos-d;}var clipping=this.clipping();var cache=[];var visible=0,j=i,v=0;var c=this.get(i-1);while(++visible){e=this.get(j);p=!e.length;if(e.length==0){e=this.create(j).addClass(this.className('jcarousel-item-placeholder'));c.length==0?this.list.prepend(e):c[back?'before':'after'](e);if(this.first!=null&&this.options.wrap=='circular'&&this.options.size!==null&&(j<=0||j>this.options.size)){g=this.get(this.index(j));if(g.length)this.add(j,g.find('>*').clone(true));}}c=e;var d=this.dimension(e);if(d==0){alert('jCarousel: No width/height set for items. This will cause an infinite loop. Aborting...');return 0;}if(this.options.wrap!='circular'&&this.options.size!==null&&j>this.options.size)cache.push(e);else if(p)l+=d;v+=d;if(v>=clipping)break;j++;}for(var x=0;x<cache.length;x++)cache[x].remove();if(l>0){this.list.css(this.wh,this.dimension(this.list)+l+'px');if(back){pos-=l;this.list.css(this.lt,$jc.intval(this.list.css(this.lt))-l+'px');}}var last=i+visible-1;if(this.options.wrap!='circular'&&this.options.size&&last>this.options.size)last=this.options.size;if(j>last){visible=0,j=last,v=0;while(++visible){var e=this.get(j--);if(!e.length)break;v+=this.dimension(e);if(v>=clipping)break;}}var first=last-visible+1;if(this.options.wrap!='circular'&&first<1)first=1;if(this.inTail&&back){pos+=this.tail;this.inTail=false;}this.tail=null;if(this.options.wrap!='circular'&&last==this.options.size&&(last-visible+1)>=1){var m=$jc.margin(this.get(last),!this.options.vertical?'marginRight':'marginBottom');if((v-m)>clipping)this.tail=v-clipping-m;}while(i-->first)pos+=this.dimension(this.get(i));this.prevFirst=this.first;this.prevLast=this.last;this.first=first;this.last=last;return pos;},animate:function(p,a){if(this.locked||this.animating)return;this.animating=true;var self=this;var scrolled=function(){self.animating=false;if(p==0)self.list.css(self.lt,0);if(self.options.wrap=='circular'||self.options.wrap=='both'||self.options.wrap=='last'||self.options.size==null||self.last<self.options.size)self.startAuto();self.buttons();self.notify('onAfterAnimation');};this.notify('onBeforeAnimation');if(!this.options.animation||a==false){this.list.css(this.lt,p+'px');scrolled();}else{var o=!this.options.vertical?{'left':p}:{'top':p};this.list.animate(o,this.options.animation,this.options.easing,scrolled);}},startAuto:function(s){if(s!=undefined)this.options.auto=s;if(this.options.auto==0)return this.stopAuto();if(this.timer!=null)return;var self=this;this.timer=setTimeout(function(){self.next();},this.options.auto*1000);},stopAuto:function(){if(this.timer==null)return;clearTimeout(this.timer);this.timer=null;},buttons:function(n,p){if(n==undefined||n==null){var n=!this.locked&&this.options.size!==0&&((this.options.wrap&&this.options.wrap!='first')||this.options.size==null||this.last<this.options.size);if(!this.locked&&(!this.options.wrap||this.options.wrap=='first')&&this.options.size!=null&&this.last>=this.options.size)n=this.tail!=null&&!this.inTail;}if(p==undefined||p==null){var p=!this.locked&&this.options.size!==0&&((this.options.wrap&&this.options.wrap!='last')||this.first>1);if(!this.locked&&(!this.options.wrap||this.options.wrap=='last')&&this.options.size!=null&&this.first==1)p=this.tail!=null&&this.inTail;}var self=this;this.buttonNext[n?'bind':'unbind'](this.options.buttonNextEvent+'.jcarousel',this.funcNext)[n?'removeClass':'addClass'](this.className('jcarousel-next-disabled')).attr('disabled',n?false:true);this.buttonPrev[p?'bind':'unbind'](this.options.buttonPrevEvent+'.jcarousel',this.funcPrev)[p?'removeClass':'addClass'](this.className('jcarousel-prev-disabled')).attr('disabled',p?false:true);if(this.buttonNext.length>0&&(this.buttonNext[0].jcarouselstate==undefined||this.buttonNext[0].jcarouselstate!=n)&&this.options.buttonNextCallback!=null){this.buttonNext.each(function(){self.options.buttonNextCallback(self,this,n);});this.buttonNext[0].jcarouselstate=n;}if(this.buttonPrev.length>0&&(this.buttonPrev[0].jcarouselstate==undefined||this.buttonPrev[0].jcarouselstate!=p)&&this.options.buttonPrevCallback!=null){this.buttonPrev.each(function(){self.options.buttonPrevCallback(self,this,p);});this.buttonPrev[0].jcarouselstate=p;}},notify:function(evt){var state=this.prevFirst==null?'init':(this.prevFirst<this.first?'next':'prev');this.callback('itemLoadCallback',evt,state);if(this.prevFirst!==this.first){this.callback('itemFirstInCallback',evt,state,this.first);this.callback('itemFirstOutCallback',evt,state,this.prevFirst);}if(this.prevLast!==this.last){this.callback('itemLastInCallback',evt,state,this.last);this.callback('itemLastOutCallback',evt,state,this.prevLast);}this.callback('itemVisibleInCallback',evt,state,this.first,this.last,this.prevFirst,this.prevLast);this.callback('itemVisibleOutCallback',evt,state,this.prevFirst,this.prevLast,this.first,this.last);},callback:function(cb,evt,state,i1,i2,i3,i4){if(this.options[cb]==undefined||(typeof this.options[cb]!='object'&&evt!='onAfterAnimation'))return;var callback=typeof this.options[cb]=='object'?this.options[cb][evt]:this.options[cb];if(!$.isFunction(callback))return;var self=this;if(i1===undefined)callback(self,state,evt);else if(i2===undefined)this.get(i1).each(function(){callback(self,this,i1,state,evt);});else{for(var i=i1;i<=i2;i++)if(i!==null&&!(i>=i3&&i<=i4))this.get(i).each(function(){callback(self,this,i,state,evt);});}},create:function(i){return this.format('<li></li>',i);},format:function(e,i){var $e=$(e).addClass(this.className('jcarousel-item')).addClass(this.className('jcarousel-item-'+i)).css({'float':'left','list-style':'none'});$e.attr('jcarouselindex',i);return $e;},className:function(c){return c+' '+c+(!this.options.vertical?'-horizontal':'-vertical');},dimension:function(e,d){var el=e.jquery!=undefined?e[0]:e;var old=!this.options.vertical?el.offsetWidth+$jc.margin(el,'marginLeft')+$jc.margin(el,'marginRight'):el.offsetHeight+$jc.margin(el,'marginTop')+$jc.margin(el,'marginBottom');if(d==undefined||old==d)return old;var w=!this.options.vertical?d-$jc.margin(el,'marginLeft')-$jc.margin(el,'marginRight'):d-$jc.margin(el,'marginTop')-$jc.margin(el,'marginBottom');$(el).css(this.wh,w+'px');return this.dimension(el);},clipping:function(){return!this.options.vertical?this.clip[0].offsetWidth-$jc.intval(this.clip.css('borderLeftWidth'))-$jc.intval(this.clip.css('borderRightWidth')):this.clip[0].offsetHeight-$jc.intval(this.clip.css('borderTopWidth'))-$jc.intval(this.clip.css('borderBottomWidth'));},index:function(i,s){if(s==undefined)s=this.options.size;return Math.round((((i-1)/s)-Math.floor((i-1)/s))*s)+1;}});$jc.extend({defaults:function(d){return $.extend(defaults,d||{});},margin:function(e,p){if(!e)return 0;var el=e.jquery!=undefined?e[0]:e;if(p=='marginRight'&&$.browser.safari){var old={'display':'block','float':'none','width':'auto'},oWidth,oWidth2;$.swap(el,old,function(){oWidth=el.offsetWidth;});old['marginRight']=0;$.swap(el,old,function(){oWidth2=el.offsetWidth;});return oWidth2-oWidth;}return $jc.intval($.css(el,p));},intval:function(v){v=parseInt(v);return isNaN(v)?0:v;}});})(jQuery);





/*
 
 jQuery Tools 1.2.3 Tooltip - UI essentials

 NO COPYRIGHTS OR LICENSES. DO WHAT YOU LIKE.

 http://flowplayer.org/tools/tooltip/

 Since: November 2008
 Date:    Mon Jun 7 13:43:53 2010 +0000 
*/
(function(f){function p(a,b,c){var h=c.relative?a.position().top:a.offset().top,e=c.relative?a.position().left:a.offset().left,i=c.position[0];h-=b.outerHeight()-c.offset[0];e+=a.outerWidth()+c.offset[1];var j=b.outerHeight()+a.outerHeight();if(i=="center")h+=j/2;if(i=="bottom")h+=j;i=c.position[1];a=b.outerWidth()+a.outerWidth();if(i=="center")e-=a/2;if(i=="left")e-=a;return{top:h,left:e}}function t(a,b){var c=this,h=a.add(c),e,i=0,j=0,m=a.attr("title"),q=n[b.effect],k,r=a.is(":input"),u=r&&a.is(":checkbox, :radio, select, :button, :submit"),
s=a.attr("type"),l=b.events[s]||b.events[r?u?"widget":"input":"def"];if(!q)throw'Nonexistent effect "'+b.effect+'"';l=l.split(/,\s*/);if(l.length!=2)throw"Tooltip: bad events configuration for "+s;a.bind(l[0],function(d){clearTimeout(i);if(b.predelay)j=setTimeout(function(){c.show(d)},b.predelay);else c.show(d)}).bind(l[1],function(d){clearTimeout(j);if(b.delay)i=setTimeout(function(){c.hide(d)},b.delay);else c.hide(d)});if(m&&b.cancelDefault){a.removeAttr("title");a.data("title",m)}f.extend(c,{show:function(d){if(!e){if(m)e=
f(b.layout).addClass(b.tipClass).appendTo(document.body).hide().append(m);else if(b.tip)e=f(b.tip).eq(0);else{e=a.next();e.length||(e=a.parent().next())}if(!e.length)throw"Cannot find tooltip for "+a;}if(c.isShown())return c;e.stop(true,true);var g=p(a,e,b);d=d||f.Event();d.type="onBeforeShow";h.trigger(d,[g]);if(d.isDefaultPrevented())return c;g=p(a,e,b);e.css({position:"absolute",top:g.top,left:g.left});k=true;q[0].call(c,function(){d.type="onShow";k="full";h.trigger(d)});g=b.events.tooltip.split(/,\s*/);
e.bind(g[0],function(){clearTimeout(i);clearTimeout(j)});g[1]&&!a.is("input:not(:checkbox, :radio), textarea")&&e.bind(g[1],function(o){o.relatedTarget!=a[0]&&a.trigger(l[1].split(" ")[0])});return c},hide:function(d){if(!e||!c.isShown())return c;d=d||f.Event();d.type="onBeforeHide";h.trigger(d);if(!d.isDefaultPrevented()){k=false;n[b.effect][1].call(c,function(){d.type="onHide";k=false;h.trigger(d)});return c}},isShown:function(d){return d?k=="full":k},getConf:function(){return b},getTip:function(){return e},
getTrigger:function(){return a}});f.each("onHide,onBeforeShow,onShow,onBeforeHide".split(","),function(d,g){f.isFunction(b[g])&&f(c).bind(g,b[g]);c[g]=function(o){f(c).bind(g,o);return c}})}f.tools=f.tools||{version:"1.2.3"};f.tools.tooltip={conf:{effect:"toggle",fadeOutSpeed:"medium",predelay:0,delay:30,opacity:1,tip:0,position:["top","center"],offset:[0,0],relative:false,cancelDefault:true,events:{def:"mouseenter,mouseleave",input:"focus,blur",widget:"focus mouseenter,blur mouseleave",tooltip:"mouseenter,mouseleave"},
layout:"<div/>",tipClass:"tooltip"},addEffect:function(a,b,c){n[a]=[b,c]}};var n={toggle:[function(a){var b=this.getConf(),c=this.getTip();b=b.opacity;b<1&&c.css({opacity:b});c.show();a.call()},function(a){this.getTip().hide();a.call()}],fade:[function(a){var b=this.getConf();this.getTip().fadeTo(b.fadeInSpeed,b.opacity,a)},function(a){this.getTip().fadeOut(this.getConf().fadeOutSpeed,a)}]};f.fn.tooltip=function(a){var b=this.data("tooltip");if(b)return b;a=f.extend(true,{},f.tools.tooltip.conf,a);
if(typeof a.position=="string")a.position=a.position.split(/,?\s/);this.each(function(){b=new t(f(this),a);f(this).data("tooltip",b)});return a.api?b:this}})(jQuery);

/*
 
 jQuery Tools 1.2.3 / Tooltip Slide Effect

 NO COPYRIGHTS OR LICENSES. DO WHAT YOU LIKE.

 http://flowplayer.org/tools/tooltip/slide.html

 Since: September 2009
 Date:    Mon Jun 7 13:43:53 2010 +0000 
*/
(function(d){var i=d.tools.tooltip;d.extend(i.conf,{direction:"up",bounce:false,slideOffset:10,slideInSpeed:200,slideOutSpeed:200,slideFade:!d.browser.msie});var e={up:["-","top"],down:["+","top"],left:["-","left"],right:["+","left"]};i.addEffect("slide",function(g){var a=this.getConf(),f=this.getTip(),b=a.slideFade?{opacity:a.opacity}:{},c=e[a.direction]||e.up;b[c[1]]=c[0]+"="+a.slideOffset;a.slideFade&&f.css({opacity:0});f.show().animate(b,a.slideInSpeed,g)},function(g){var a=this.getConf(),f=a.slideOffset,
b=a.slideFade?{opacity:0}:{},c=e[a.direction]||e.up,h=""+c[0];if(a.bounce)h=h=="+"?"-":"+";b[c[1]]=h+"="+f;this.getTip().animate(b,a.slideOutSpeed,function(){d(this).hide();g.call()})})})(jQuery);



/**
* hoverIntent r5 // 2007.03.27 // jQuery 1.1.2
* <http://cherne.net/brian/resources/jquery.hoverIntent.html>
* 
* @param  f  onMouseOver function || An object with configuration options
* @param  g  onMouseOut function  || Nothing (use configuration options object)
* @return    The object (aka "this") that called hoverIntent, and the event object
* @author    Brian Cherne <brian@cherne.net>
*/
(function($){$.fn.hoverIntent=function(f,g){var cfg={sensitivity:7,interval:100,timeout:0};cfg=$.extend(cfg,g?{over:f,out:g}:f);var cX,cY,pX,pY;var track=function(ev){cX=ev.pageX;cY=ev.pageY;};var compare=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);if((Math.abs(pX-cX)+Math.abs(pY-cY))<cfg.sensitivity){$(ob).unbind("mousemove",track);ob.hoverIntent_s=1;return cfg.over.apply(ob,[ev]);}else{pX=cX;pY=cY;ob.hoverIntent_t=setTimeout(function(){compare(ev,ob);},cfg.interval);}};var delay=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);ob.hoverIntent_s=0;return cfg.out.apply(ob,[ev]);};var handleHover=function(e){var p=(e.type=="mouseover"?e.fromElement:e.toElement)||e.relatedTarget;while(p&&p!=this){try{p=p.parentNode;}catch(e){p=this;}}if(p==this){return false;}var ev=jQuery.extend({},e);var ob=this;if(ob.hoverIntent_t){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);}if(e.type=="mouseover"){pX=ev.pageX;pY=ev.pageY;$(ob).bind("mousemove",track);if(ob.hoverIntent_s!=1){ob.hoverIntent_t=setTimeout(function(){compare(ev,ob);},cfg.interval);}}else{$(ob).unbind("mousemove",track);if(ob.hoverIntent_s==1){ob.hoverIntent_t=setTimeout(function(){delay(ev,ob);},cfg.timeout);}}};return this.mouseover(handleHover).mouseout(handleHover);};})(jQuery);



/*
 * 	Easy Slider 1.7 - jQuery plugin
 *	written by Alen Grakalic	
 *	http://cssglobe.com/post/4004/easy-slider-15-the-easiest-jquery-plugin-for-sliding
 *
 *	Copyright (c) 2009 Alen Grakalic (http://cssglobe.com)
 *	Dual licensed under the MIT (MIT-LICENSE.txt)
 *	and GPL (GPL-LICENSE.txt) licenses.
 *
 *	Built for jQuery library
 *	http://jquery.com
 *
 */
 
/*
 *	markup example for $("#slider").easySlider();
 *	
 * 	<div id="slider">
 *		<ul>
 *			<li><img src="images/01.jpg" alt="" /></li>
 *			<li><img src="images/02.jpg" alt="" /></li>
 *			<li><img src="images/03.jpg" alt="" /></li>
 *			<li><img src="images/04.jpg" alt="" /></li>
 *			<li><img src="images/05.jpg" alt="" /></li>
 *		</ul>
 *	</div>
 *
 */

(function($) {

	$.fn.easySlider = function(options){
	  
		// default configuration properties
		var defaults = {			
			prevId: 		'prevBtn',
			prevText: 		'Previous',
			nextId: 		'nextBtn',	
			nextText: 		'Next',
			controlsShow:	true,
			controlsBefore:	'',
			controlsAfter:	'',	
			controlsFade:	true,
			firstId: 		'firstBtn',
			firstText: 		'First',
			firstShow:		false,
			lastId: 		'lastBtn',	
			lastText: 		'Last',
			lastShow:		false,				
			vertical:		false,
			speed: 			800,
			auto:			false,
			pause:			4000,
			continuous:		false, 
			numeric: 		false,
			numericId: 		'controls'
		}; 
		
		var options = $.extend(defaults, options);  
				
		this.each(function() {  
			var obj = $(this); 				
			var s = $("li", obj).length;
			var w = $("li", obj).width(); 
			var h = $("li", obj).height(); 
			var clickable = true;
			obj.width(w); 
			obj.height(h); 
			obj.css("overflow","hidden");
			var ts = s-1;
			var t = 0;
			$("ul", obj).css('width',s*w);			
			
			if(options.continuous){
				$("ul", obj).prepend($("ul li:last-child", obj).clone().css("margin-left","-"+ w +"px"));
				$("ul", obj).append($("ul li:nth-child(2)", obj).clone());
				$("ul", obj).css('width',(s+1)*w);
			};				
			
			if(!options.vertical) $("li", obj).css('float','left');
								
			if(options.controlsShow){
				var html = options.controlsBefore;				
				if(options.numeric){
					html += '<ol id="'+ options.numericId +'"></ol>';
				} else {
					if(options.firstShow) html += '<span id="'+ options.firstId +'"><a href=\"javascript:void(0);\">'+ options.firstText +'</a></span>';
					html += ' <span id="'+ options.prevId +'"><a href=\"javascript:void(0);\">'+ options.prevText +'</a></span>';
					html += ' <span id="'+ options.nextId +'"><a href=\"javascript:void(0);\">'+ options.nextText +'</a></span>';
					if(options.lastShow) html += ' <span id="'+ options.lastId +'"><a href=\"javascript:void(0);\">'+ options.lastText +'</a></span>';				
				};
				
				html += options.controlsAfter;						
				$(obj).after(html);										
			};
			
			if(options.numeric){									
				for(var i=0;i<s;i++){						
					$(document.createElement("li"))
						.attr('id',options.numericId + (i+1))
						.html('<a rel='+ i +' href=\"javascript:void(0);\">'+ (i+1) +'</a>')
						.appendTo($("#"+ options.numericId))
						.click(function(){							
							animate($("a",$(this)).attr('rel'),true);
						}); 												
				};							
			} else {
				$("a","#"+options.nextId).click(function(){		
					animate("next",true);
				});
				$("a","#"+options.prevId).click(function(){		
					animate("prev",true);				
				});	
				$("a","#"+options.firstId).click(function(){		
					animate("first",true);
				});				
				$("a","#"+options.lastId).click(function(){		
					animate("last",true);				
				});				
			};
			
			function setCurrent(i){
				i = parseInt(i)+1;
				$("li", "#" + options.numericId).removeClass("current");
				$("li#" + options.numericId + i).addClass("current");
			};
			
			function adjust(){
				if(t>ts) t=0;		
				if(t<0) t=ts;	
				if(!options.vertical) {
					$("ul",obj).css("margin-left",(t*w*-1));
				} else {
					$("ul",obj).css("margin-left",(t*h*-1));
				}
				clickable = true;
				if(options.numeric) setCurrent(t);
			};
			
			function animate(dir,clicked){
				if (clickable){
					clickable = false;
					var ot = t;				
					switch(dir){
						case "next":
							t = (ot>=ts) ? (options.continuous ? t+1 : ts) : t+1;						
							break; 
						case "prev":
							t = (t<=0) ? (options.continuous ? t-1 : 0) : t-1;
							break; 
						case "first":
							t = 0;
							break; 
						case "last":
							t = ts;
							break; 
						default:
							t = dir;
							break; 
					};	
					var diff = Math.abs(ot-t);
					var speed = diff*options.speed;						
					if(!options.vertical) {
						p = (t*w*-1);
						$("ul",obj).animate(
							{ marginLeft: p }, 
							{ queue:false, duration:speed, complete:adjust }
						);				
					} else {
						p = (t*h*-1);
						$("ul",obj).animate(
							{ marginTop: p }, 
							{ queue:false, duration:speed, complete:adjust }
						);					
					};
					
					if(!options.continuous && options.controlsFade){					
						if(t==ts){
							$("a","#"+options.nextId).hide();
							$("a","#"+options.lastId).hide();
						} else {
							$("a","#"+options.nextId).show();
							$("a","#"+options.lastId).show();					
						};
						if(t==0){
							$("a","#"+options.prevId).hide();
							$("a","#"+options.firstId).hide();
						} else {
							$("a","#"+options.prevId).show();
							$("a","#"+options.firstId).show();
						};					
					};				
					
					if(clicked) clearTimeout(timeout);
					if(options.auto && dir=="next" && !clicked){;
						timeout = setTimeout(function(){
							animate("next",false);
						},diff*options.speed+options.pause);
					};
			
				};
				
			};
			// init
			var timeout;
			if(options.auto){;
				timeout = setTimeout(function(){
					animate("next",false);
				},options.pause);
			};		
			
			if(options.numeric) setCurrent(0);
		
			if(!options.continuous && options.controlsFade){					
				$("a","#"+options.prevId).hide();
				$("a","#"+options.firstId).hide();				
			};				
			
		});
	  
	};

})(jQuery);

/**
 * --------------------------------------------------------------------
 * jQuery-Plugin "pngFix"
 * Version: 1.2, 09.03.2009
 * by Andreas Eberhard, andreas.eberhard@gmail.com
 *                      http://jquery.andreaseberhard.de/
 *
 * Copyright (c) 2007 Andreas Eberhard
 * Licensed under GPL (http://www.opensource.org/licenses/gpl-license.php)
 *
 * Changelog:
 *    09.03.2009 Version 1.2
 *    - Update for jQuery 1.3.x, removed @ from selectors
 *    11.09.2007 Version 1.1
 *    - removed noConflict
 *    - added png-support for input type=image
 *    - 01.08.2007 CSS background-image support extension added by Scott Jehl, scott@filamentgroup.com, http://www.filamentgroup.com
 *    31.05.2007 initial Version 1.0
 * --------------------------------------------------------------------
 * @example $(function(){$(document).pngFix();});
 * @desc Fixes all PNG's in the document on document.ready
 *
 * jQuery(function(){jQuery(document).pngFix();});
 * @desc Fixes all PNG's in the document on document.ready when using noConflict
 *
 * @example $(function(){$('div.examples').pngFix();});
 * @desc Fixes all PNG's within div with class examples
 *
 * @example $(function(){$('div.examples').pngFix( { blankgif:'ext.gif' } );});
 * @desc Fixes all PNG's within div with class examples, provides blank gif for input with png
 * --------------------------------------------------------------------
 */

(function($) {

jQuery.fn.pngFix = function(settings) {

	// Settings
	settings = jQuery.extend({
		blankgif: 'blank.gif'
	}, settings);

	var ie55 = (navigator.appName == "Microsoft Internet Explorer" && parseInt(navigator.appVersion) == 4 && navigator.appVersion.indexOf("MSIE 5.5") != -1);
	var ie6 = (navigator.appName == "Microsoft Internet Explorer" && parseInt(navigator.appVersion) == 4 && navigator.appVersion.indexOf("MSIE 6.0") != -1);

	if (jQuery.browser.msie && (ie55 || ie6)) {

		//fix images with png-source
		jQuery(this).find("img[src$=.png]").each(function() {

			jQuery(this).attr('width',jQuery(this).width());
			jQuery(this).attr('height',jQuery(this).height());

			var prevStyle = '';
			var strNewHTML = '';
			var imgId = (jQuery(this).attr('id')) ? 'id="' + jQuery(this).attr('id') + '" ' : '';
			var imgClass = (jQuery(this).attr('class')) ? 'class="' + jQuery(this).attr('class') + '" ' : '';
			var imgTitle = (jQuery(this).attr('title')) ? 'title="' + jQuery(this).attr('title') + '" ' : '';
			var imgAlt = (jQuery(this).attr('alt')) ? 'alt="' + jQuery(this).attr('alt') + '" ' : '';
			var imgAlign = (jQuery(this).attr('align')) ? 'float:' + jQuery(this).attr('align') + ';' : '';
			var imgHand = (jQuery(this).parent().attr('href')) ? 'cursor:hand;' : '';
			if (this.style.border) {
				prevStyle += 'border:'+this.style.border+';';
				this.style.border = '';
			}
			if (this.style.padding) {
				prevStyle += 'padding:'+this.style.padding+';';
				this.style.padding = '';
			}
			if (this.style.margin) {
				prevStyle += 'margin:'+this.style.margin+';';
				this.style.margin = '';
			}
			var imgStyle = (this.style.cssText);

			strNewHTML += '<span '+imgId+imgClass+imgTitle+imgAlt;
			strNewHTML += 'style="position:relative;white-space:pre-line;display:inline-block;background:transparent;'+imgAlign+imgHand;
			strNewHTML += 'width:' + jQuery(this).width() + 'px;' + 'height:' + jQuery(this).height() + 'px;';
			strNewHTML += 'filter:progid:DXImageTransform.Microsoft.AlphaImageLoader' + '(src=\'' + jQuery(this).attr('src') + '\', sizingMethod=\'scale\');';
			strNewHTML += imgStyle+'"></span>';
			if (prevStyle != ''){
				strNewHTML = '<span style="position:relative;display:inline-block;'+prevStyle+imgHand+'width:' + jQuery(this).width() + 'px;' + 'height:' + jQuery(this).height() + 'px;'+'">' + strNewHTML + '</span>';
			}

			jQuery(this).hide();
			jQuery(this).after(strNewHTML);

		});

		// fix css background pngs
		jQuery(this).find("*").each(function(){
			var bgIMG = jQuery(this).css('background-image');
			if(bgIMG.indexOf(".png")!=-1){
				var iebg = bgIMG.split('url("')[1].split('")')[0];
				jQuery(this).css('background-image', 'none');
				jQuery(this).get(0).runtimeStyle.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + iebg + "',sizingMethod='scale')";
			}
		});
		
		//fix input with png-source
		jQuery(this).find("input[src$=.png]").each(function() {
			var bgIMG = jQuery(this).attr('src');
			jQuery(this).get(0).runtimeStyle.filter = 'progid:DXImageTransform.Microsoft.AlphaImageLoader' + '(src=\'' + bgIMG + '\', sizingMethod=\'scale\');';
   		jQuery(this).attr('src', settings.blankgif)
		});
	
	}
	
	return jQuery;

};

})(jQuery);