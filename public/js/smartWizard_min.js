/*
 * SmartWizard 3.3.1 plugin
 * jQuery Wizard control Plugin
 * by Dipu
 *
 * Refactored and extended:
 * https://github.com/mstratman/jQuery-Smart-Wizard
 *
 * Original URLs:
 * http://www.techlaboratory.net
 * http://tech-laboratory.blogspot.com
 */

function SmartWizard(f,e){this.target=f;this.options=e;this.curStepIdx=e.selected;this.steps=$(f).children("ul").children("li").children("a");this.contentWidth=0;this.msgBox=$('<div class="msgBox alert alert-error"><button data-dismiss="alert" class="close" type="button">\u00d7</button><div class="content"></div></div>');this.elmStepContainer=$("<div></div>").addClass("stepContainer");this.loader=$("<div>Loading</div>").addClass("loader");this.buttons={next:$("<a>"+e.labelNext+"</a>").attr("href",
    "#").addClass("btn buttonNext"),previous:$("<a>"+e.labelPrevious+"</a>").attr("href","#").addClass("btn buttonPrevious"),finish:$('<button type="submit">'+e.labelFinish+"</button>").attr("href","#").addClass("btn btn-inverse buttonFinish")};var g=function(a,c){return $($(c,a.target).attr("href").replace(/^.+#/,"#"),a.target)},h=function(a,c){var d=a.steps.eq(c),b=a.options.contentURL,e=a.options.contentURLData,f=d.data("hasContent"),i=c+1;b&&0<b.length?a.options.contentCache&&f?j(a,c):(b={url:b,type:"POST",
    data:{step_number:i},dataType:"text",beforeSend:function(){a.loader.show()},error:function(){a.loader.hide()},success:function(b){a.loader.hide();b&&0<b.length&&(d.data("hasContent",!0),g(a,d).html(b),j(a,c))}},e&&(b=$.extend(b,e(i))),$.ajax(b)):j(a,c)},j=function(a,c){var d=a.steps.eq(c),b=a.steps.eq(a.curStepIdx);if(c!=a.curStepIdx&&$.isFunction(a.options.onLeaveStep)){var e={fromStep:a.curStepIdx+1,toStep:c+1};if(!a.options.onLeaveStep.call(a,$(b),e))return!1}a.elmStepContainer.height(g(a,d).outerHeight());
    e=a.curStepIdx;a.curStepIdx=c;if("slide"==a.options.transitionEffect)g(a,b).slideUp("fast",function(){g(a,d).slideDown("fast");i(a,b,d)});else if("fade"==a.options.transitionEffect)g(a,b).fadeOut("fast",function(){g(a,d).fadeIn("fast");i(a,b,d)});else if("slideleft"==a.options.transitionEffect){var f=null,h=0;c>e?(f=a.contentWidth+10,nextElmLeft2=0,h=0-g(a,b).outerWidth()):(f=0-g(a,d).outerWidth()+20,nextElmLeft2=0,h=10+g(a,b).outerWidth());c==e?(f=$($(d,a.target).attr("href"),a.target).outerWidth()+
        20,nextElmLeft2=0,h=0-$($(b,a.target).attr("href"),a.target).outerWidth()):$($(b,a.target).attr("href"),a.target).animate({left:h},"fast",function(){$($(b,a.target).attr("href"),a.target).hide()});g(a,d).css("left",f).show().animate({left:nextElmLeft2},"fast",function(){i(a,b,d)})}else g(a,b).hide(),g(a,d).show(),i(a,b,d);return!0},i=function(a,c,d){$(c,a.target).removeClass("selected");$(c,a.target).addClass("done");$(d,a.target).removeClass("disabled");$(d,a.target).removeClass("done");$(d,a.target).addClass("selected");
    $(d,a.target).attr("isDone",1);a.options.cycleSteps||(0>=a.curStepIdx?($(a.buttons.previous).addClass("disabled buttonDisabled"),a.options.hideButtonsOnDisabled&&$(a.buttons.previous).hide()):($(a.buttons.previous).removeClass("disabled buttonDisabled"),a.options.hideButtonsOnDisabled&&$(a.buttons.previous).show()),a.steps.length-1<=a.curStepIdx?($(a.buttons.next).addClass("disabled buttonDisabled"),a.options.hideButtonsOnDisabled&&$(a.buttons.next).hide()):($(a.buttons.next).removeClass("disabled buttonDisabled"),
        a.options.hideButtonsOnDisabled&&$(a.buttons.next).show()));!a.steps.hasClass("disabled")||a.options.enableFinishButton?($(a.buttons.finish).removeClass("disabled buttonDisabled"),a.options.hideButtonsOnDisabled&&$(a.buttons.finish).show()):($(a.buttons.finish).addClass("disabled buttonDisabled"),a.options.hideButtonsOnDisabled&&$(a.buttons.finish).hide());if($.isFunction(a.options.onShowStep)&&(c={fromStep:parseInt($(c).attr("rel")),toStep:parseInt($(d).attr("rel"))},!a.options.onShowStep.call(this,
        $(d),c)))return!1;if(a.options.noForwardJumping)for(d=a.curStepIdx+2;d<=a.steps.length;d++)a.disableStep(d)};SmartWizard.prototype.goForward=function(){var a=this.curStepIdx+1;if(this.steps.length<=a){if(!this.options.cycleSteps)return!1;a=0}h(this,a)};SmartWizard.prototype.goBackward=function(){var a=this.curStepIdx-1;if(0>a){if(!this.options.cycleSteps)return!1;a=this.steps.length-1}h(this,a)};SmartWizard.prototype.goToStep=function(a){a-=1;0<=a&&a<this.steps.length&&h(this,a)};SmartWizard.prototype.enableStep=
    function(a){a-=1;if(a==this.curStepIdx||0>a||a>=this.steps.length)return!1;a=this.steps.eq(a);$(a,this.target).attr("isDone",1);$(a,this.target).removeClass("disabled").removeClass("selected").addClass("done")};SmartWizard.prototype.disableStep=function(a){a-=1;if(a==this.curStepIdx||0>a||a>=this.steps.length)return!1;a=this.steps.eq(a);$(a,this.target).attr("isDone",0);$(a,this.target).removeClass("done").removeClass("selected").addClass("disabled")};SmartWizard.prototype.currentStep=function(){return this.curStepIdx+
    1};SmartWizard.prototype.showMessage=function(a){$(".content",this.msgBox).html(a);this.msgBox.show()};SmartWizard.prototype.hideMessage=function(){this.msgBox.fadeOut("normal")};SmartWizard.prototype.showError=function(a){this.setError(a,!0)};SmartWizard.prototype.hideError=function(a){this.setError(a,!1)};SmartWizard.prototype.setError=function(a,c){"object"==typeof a&&(c=a.iserror,a=a.stepnum);c?$(this.steps.eq(a-1),this.target).addClass("error"):$(this.steps.eq(a-1),this.target).removeClass("error")};
    SmartWizard.prototype.fixHeight=function(){var a=0,c=this.steps.eq(this.curStepIdx),c=g(this,c);c.children().each(function(){a+=$(this).outerHeight()});c.height(a+5);this.elmStepContainer.height(a+20)};(function(a){var c=$("<div></div>").addClass("actionBar");c.append(a.msgBox);$(".close",a.msgBox).click(function(){a.msgBox.fadeOut("normal");return!1});var d=a.target.children("div");a.target.children("ul").addClass("anchor");d.addClass("content");a.options.errorSteps&&0<a.options.errorSteps.length&&
    $.each(a.options.errorSteps,function(b,c){a.setError({stepnum:c,iserror:!0})});a.elmStepContainer.append(d);c.append(a.loader);a.target.append(a.elmStepContainer);c.append(a.buttons.finish).append(a.buttons.next).append(a.buttons.previous);a.target.append(c);this.contentWidth=a.elmStepContainer.width();$(a.buttons.next).click(function(){a.goForward();return!1});$(a.buttons.previous).click(function(){a.goBackward();return!1});$(a.buttons.finish).click(function(){if(!$(this).hasClass("buttonDisabled"))if($.isFunction(a.options.onFinish)){var b=
    {fromStep:a.curStepIdx+1};a.options.onFinish.call(this,$(a.steps),b)}else(b=a.target.parents("form"))&&b.length&&b.submit();return!1});$(a.steps).bind("click",function(){if(a.steps.index(this)==a.curStepIdx)return!1;var b=a.steps.index(this);1==a.steps.eq(b).attr("isDone")-0&&h(a,b);return!1});a.options.keyNavigation&&$(document).keyup(function(b){39==b.which?a.goForward():37==b.which&&a.goBackward()});a.options.enableAllSteps?($(a.steps,a.target).removeClass("selected").removeClass("disabled").addClass("done"),
        $(a.steps,a.target).attr("isDone",1)):($(a.steps,a.target).removeClass("selected").removeClass("done").addClass("disabled"),$(a.steps,a.target).attr("isDone",0));$(a.steps,a.target).each(function(b){$($(this).attr("href").replace(/^.+#/,"#"),a.target).hide();$(this).attr("rel",b+1)});h(a,a.curStepIdx)})(this)}
(function(f){f.fn.smartWizard=function(e){var g=arguments,h=void 0,j=this.each(function(){var i=f(this).data("smartWizard");if("object"==typeof e||!e||!i){var a=f.extend({},f.fn.smartWizard.defaults,e||{});i||(i=new SmartWizard(f(this),a),f(this).data("smartWizard",i))}else{if("function"==typeof SmartWizard.prototype[e])return h=SmartWizard.prototype[e].apply(i,Array.prototype.slice.call(g,1));f.error("Method "+e+" does not exist on jQuery.smartWizard")}});return void 0===h?j:h};f.fn.smartWizard.defaults=
{selected:0,keyNavigation:!0,enableAllSteps:!1,transitionEffect:"fade",contentURL:null,contentCache:!0,cycleSteps:!1,enableFinishButton:!1,hideButtonsOnDisabled:!1,errorSteps:[],labelNext:"Next",labelPrevious:"Previous",labelFinish:"Finish",noForwardJumping:!1,onLeaveStep:null,onShowStep:null,onFinish:null}})(jQuery);/**
 * Created by Paul on 8/20/14.
 */
