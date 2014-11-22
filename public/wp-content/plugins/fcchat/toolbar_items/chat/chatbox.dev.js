/*
 * Chatbox menu item
 */

jGo.fcchat_toolbar.chatbox = {};
var w=jGo.mobile?300:FCChatConfig.chatbox.dialog_width-0+200
//Chatbox style template
jGo.fcchat_toolbar.chatbox.style={
	menu_item:{
		width:180,
		icon: FCChatConfig.dir + "current_skin/bubblechat.png",
		icon_css:"",
		text:jGo.fcchat_toolbar.style.toolbar_item.text,
		buttons:jGo.fcchat_toolbar.style.toolbar_item.buttons,
		padding_left:10,
		padding_top:jGo.fcchat_toolbar.style.toolbar_item.chatcenter_layout.info_box.padding_top
	},
	dialog_box:{
		width:(jGo.mobile&&!jGo.fcchat_toolbar.config.tablet?300:FCChatConfig.chatbox.dialog_width),
		height:(jGo.mobile&&!jGo.fcchat_toolbar.config.tablet?348:FCChatConfig.chatbox.dialog_height),
		css:jGo.fcchat_toolbar.style.dialog_box.css,
		title_box_css:"top:0em;left:0em;height:3.333em;background-color:#2E9FFF;border-bottom:.083em solid #cccccc;",
		userlist_box_css:"top:3.333em;left:0em;-moz-overflow-scrolling: touch;-webkit-overflow-scrolling: touch;overflow-scrolling: touch;height:3.333em;border-top:.083em solid #cccccc;border-bottom:.083em dotted #444444;",
		tab_cover_css:"width:5.833em;height:5em;",
		up_tab_css:"",
		down_tab_css:"",
		view_msg_box_css:"-moz-overflow-scrolling: touch;-webkit-overflow-scrolling: touch;overflow-scrolling: touch;top:6.833em;left:0em;height:16.917em;padding-top:.333em;",
		send_msg_box_css:"top:24.083em;left:0em;height:4.5em;border-top:.083em dotted #444444;",
		input_css:"font-size:1em;padding:0em;height:1.5em !important;border:.083em solid silver !important;background-color:white !important;color:#44444 !important;",
		text:{
			css:"font-family:arial;font-size:1em;color:#444444;",
			title_css:"font-weight:bold;color:white;",
			link_css:"color:white;",
			disabled_css:"color:#dddddd;",
			secondary_link_css:"color:#528DC4;text-decoration:none;",
			screen_name_css:"font-family:arial;font-size:1.16em;color:green;font-weight:700;text-decoration:none;",
			timestamp_css:"color:green;",
			info:"color:gray;font-style:italic;",
			user_info_css:"color:#888888;",
			offline_css:"font-style:italic;color:green;"
		}
	},
	infobox_menu:{
		position:{
			left:null,
			top:null,
			offsetLeft:-60,
			offsetTop:30
		},
		css:{
			width:"20.833em",
			height:"20.833em",
			"font-size":"12px",
			"-webkit-box-shadow": ".083em .083em .083em rgba(0,0,0,0.3)",
			"box-shadow": "0em 0em .25em .083em rgba(0,0,0,0.3)",
			"background-color":jGo.util.getCSSProp("jGo.fcchat_toolbar.style.dialog_box.css","background-color"),
			border:".083em solid gray"
		},
		menu_item:{
			max_title_length:300,
			hide_icon:{
				css:"color:#444444;font-stretch:wider;font-size:16px;font-weight:bold;text-decoration:none"
			}
		}
	}
};


//Chatbox functions
(function () {
	
	var jQ = jGo.$;
	var z_b = jGo.config.max_z_index - 100;
	var basedir;
	var _h;
	var config =jGo.fcchat_toolbar.chatbox.style;
	// Translate units to em
	config.dialog_box.width_em=config.dialog_box.width/12;
	config.dialog_box.height_em=config.dialog_box.height/12;
	var _hrf = "href='javascript:fc_chat.";
	var mobile = jGo.mobile;
	var __;
	var icon_css = "background-color:#aaaaaa";
	var close_icon_style="float:right;margin-right:.583em;" + config.dialog_box.text.link_css + ";text-decoration:none;font-weight:bold;font-stretch:wider;";
	var txt=config.dialog_box.text;
	var rendered=0;
	var toggle=0;
	var page_tags;
	
    var tab = 0;
	
	function EN(value) {
        var n = parseInt(value);
        return(n == null || isNaN(n) ? 0: n);
    };
    
    this.close_disc = function(){
    	if(toggle){
    		toggle=0;
    		var req="00002z"+toggle;
    		fc_chat.sendMsg(req,1);
    	}
    }; 
    
    this.enable_disc = function(){
    	jQ('div.fc_disc_button').html(enable_toolbar_disc());
    };
    this.disable_disc = function(){
    	jQ('div.fc_disc_button').html(disable_toolbar_disc());
    };
    
    this.enable_disc_mobile = function(){
    	jQ('span.fc_disc_button').html(enable_toolbar_disc_mobile());
    };
    this.disable_disc_mobile = function(){
    	jQ('span.fc_disc_button').html(disable_toolbar_disc_mobile());
    };
    
    this.click_tab = function(e){
    	if(mobile||e.target.getAttribute('id')=='fc_disc_up'&&tab==1||e.target.getAttribute('id')=='fc_disc_down'&&tab==0){
	    	tab_handler();
    	}
    };

    this.reset_disc = function(){
    	jQ("#fc_page_chat").html(add_page_start());
        jQ("#fc_disc_userlist").html("");
    };
    
    var tab_handler = function(){
    	var ul = jQ('#fc_disc_userlist_wrapper');
		var pg = jQ('#fc_page_chat_wrapper');
		var tabcover = jQ('#fc_tab_cover');
		var tabup = jQ('#fc_disc_up');
		var tabdown = jQ('#fc_disc_down');
		var font_size = EN(jQ('#fc_page_discussion_dialog').css('font-size'));
		var tot = (ul.height()+pg.height() + 2)/font_size;
		var top = EN(ul.css("top"))/font_size;
		var height;
		if(tab){
			ul.css({height:(40/12)+"em"});
			top += 42/12;
			height = tot-42/12;
			tab=0;
		}else{
			ul.css({height:((tot-42/12)+"em")});
			top +=  tot - 40/12;
			height = 40/12;
			tab=1;
		}
		pg.css({height:height+"em",top:top+"em"});
		tabcover.css({top:(top-30/12)+"em"});
		tabup.css({top:(top-11/12)+"em"});
		tabdown.css({top:(top+3/12)+"em"});
    };
    
    var add_page_start = function(){
    	return "<div style='margin-bottom:.166em' id='fc_disc_pghdr'><span style='"+txt.info+"'>"+__(463,'Chat:')+"</span><span style='margin-left:.833em;"+txt.info+"' id='fc_disc_pg'></span></div>" +
				"<span id='fc_page_chat_loading' style='"+txt.info+"'>"+__(120,'Loading Chat...Please Wait...')+"</span>";
    };
    
    var set_more_msgs = function(count){
		return '<a style="font-weight:bold;'+txt.secondary_link_css+';text-decoration:none"' +
		'href="javascript:void" onclick="fc_chat.cDisc();return false">&laquo;&laquo; '+__(456,"More") +
		'</a>&nbsp;<span style="'+txt.info+'">('+count+')</span>';
	};
	
	// Register info menu
	//  _t fc_chat object
	//  s default style
	//  target element opening window
	jGo._['menu.pg_info'] = function(_t,s,target){ 
		s = jQ.extend(true, {},jGo.fcchat_toolbar.chatbox.style.infobox_menu);
    	var menu = _t.createWidget('DefaultMenu', [ s,
    	      info_box_content(),                                        
    	      null , jQ(target),
    	      p = jQ(document.body),(_t.getexp6()||(mobile)?0:1),mobile]);
    	return menu;
    };
   
    var info_box_content = function(){
    	var na = __(464,'Not Specified');
    	var title = document.title;
    	if(title>config.infobox_menu.menu_item.max_title_length){
    		title = title.substring(0,config.infobox_menu.menu_item.max_title_length)+'...';
    	}
    	if(!page_tags.use_page_title||title==''){
    		title=na;
    	}
    	if(page_tags.topic){
    		title=page_tags.topic;
    	}
    	var desc = "<b>"+__(465,'Description')+":</b> " + na;
    	if(page_tags.desc){
    		desc = page_tags.desc;
    	}
    	return "<div style='padding:15px'>" +
    			"<span style='"+txt.info+"'><b>"+__(466,'Topic')+":</b> "+title+"<br><br>" +
    			desc + "</span></div>";
    };
    var toggle_disc = function(){
    	var req="00002z"+toggle;
    	fc_chat.sendMsg(req,1);
    }; 
    
    var add_count = function(){
    	return "<span class='fc_disc_count fc_info_text' style='"+config.menu_item.text.info_css+"'>("+fc_chat.discC+")</span>";
    };
    
    var enable_toolbar_disc = function(){
    	return "<a style='text-decoration:none;' href='javascript:jGo.fcchat_toolbar.chatbox.tgl_dialog()'>" +
		(config.menu_item.icon!=''?"<img style='display:block;position:absolute;top:"+ (jGo.fcchat_toolbar.style.icons_16px.top) + "px; left: "+config.menu_item.padding_left+"px;width:16px;height:16px;"+config.menu_item.icon_css+"' src='"+config.menu_item.icon+"'>":"") +
		"<div id='jGo_disc_txt_inner' style='position:absolute;top:0px;left:"+(config.menu_item.icon!=''?31:10)+"px;width:"+(config.menu_item.width-(config.menu_item.icon!=''?28:7))+"px;padding-top:"+(config.menu_item.padding_top+fc_chat.get_ie_offset())+"px;"+jGo.fcchat_toolbar.style.text+";"+config.menu_item.buttons.states.link_css+";'>" +(page_tags.button_text)+ " "+add_count()+"</div>" +
		"</a>";
    };
    
    var disable_toolbar_disc = function(){
    	return "<a style='text-decoration:none;cursor:default;' href='javascript:void(0)'>" +
		(config.menu_item.icon!=''?"<img style='display:block;position:absolute;top:"+ (jGo.fcchat_toolbar.style.icons_16px.top) + "px; left: "+config.menu_item.padding_left+"px;width:16px;height:16px;"+config.menu_item.icon_css+"' src='"+config.menu_item.icon+"'>":"") +
		"<div id='jGo_disc_txt_inner' style='position:absolute;top:0px;left:"+(config.menu_item.icon!=''?31:10)+"px;width:"+(config.menu_item.width-(config.menu_item.icon!=''?28:7))+"px;padding-top:"+(config.menu_item.padding_top+fc_chat.get_ie_offset())+"px;"+jGo.fcchat_toolbar.style.text+";"+config.menu_item.buttons.states.disabled_css+";'>" +(page_tags.button_text)+ " "+add_count()+"</div>" +
		"</a>";
    };
    
    var enable_toolbar_disc_mobile = function(){
    	var layout = "<a style='text-decoration:none;' href='javascript:jGo.fcchat_toolbar.chatbox.tgl_dialog()'>" +
		(config.menu_item.icon!=''?"<img style='width:16px;height:16px;"+config.menu_item.icon_css+"' src='"+config.menu_item.icon+"'>":"") +
		"&nbsp;&nbsp;<span id='jGo_disc_txt_inner' style='"+jGo.fcchat_toolbar.style.text+";"+config.menu_item.buttons.states.link_css+";'>" +(page_tags.button_text)+ " "+add_count()+"</span>" +
		"</a>";
    	if(jGo.fcchat_toolbar.config.layout==2){
    		layout="<a style='text-decoration:none;' href='javascript:jGo.fcchat_toolbar.chatbox.tgl_dialog()'>" +
    	
    		"&nbsp;<span class='fc_icon fc_icon-bubble' id='jGo_disc_txt_inner' style='"+config.menu_item.buttons.states.link_css+";'>"+add_count()+"</span>" +
    		"</a>";
    	}
    	return layout;
    };
    
    var disable_toolbar_disc_mobile = function(){
    	var layout = "<a style='text-decoration:none;cursor:default;' href='javascript:void(0)'>" +
		(config.menu_item.icon!=''?"<img style='width:16px;height:16px;"+config.menu_item.icon_css+"' src='"+config.menu_item.icon+"'>":"") +
		"&nbsp;&nbsp;<span id='jGo_disc_txt_inner' style='"+jGo.fcchat_toolbar.style.text+";"+config.menu_item.buttons.states.disabled_css+";'>" +(page_tags.button_text)+ " "+add_count()+"</span>" +
		"</a>";
    	if(jGo.fcchat_toolbar.config.layout==2){
    		layout="<a style='text-decoration:none;cursor:default;' href='javascript:void(0)'>" +
    	
    		"&nbsp;<span class='fc_icon fc_icon-bubble' id='jGo_disc_txt_inner' style='"+config.menu_item.buttons.states.disabled_css+";'>"+add_count()+"</span>" +
    		"</a>";
    	}
    	return layout;
    };
    
    var init = function(id,k){
		//Initialize hooks
		jGo.hooks.addHook(id+'_close_dialogs','close_disc',this,'close_disc');
		jGo.hooks.addHook('fcchat_enable_toolbar_fn','enable_toolbar_disc',this,'enable_disc'+(k?'_mobile':''));
		jGo.hooks.addHook('fcchat_disable_toolbar_fn','disable_toolbar_disc',this,'disable_disc'+(k?'_mobile':''));
		jGo.hooks.addHook('fcchat_reset_vars','reset_disc_chat',this,'reset_disc');
		__=fc_chat.textSetter;
		basedir = FCChatConfig.dir;
		page_tags = fc_chat.chat_params;
		_h = basedir + "current_skin/";
		var layout =FCChatConfig.chatbox.layout;
		if(layout==1||(config.dialog_box.width<400)){
			config.dialog_box.userlist_box_css+="height:6.667em;width:"+config.dialog_box.width_em + "em;";
			config.dialog_box.view_msg_box_css+="top:10.167em;left:0em;width:"+config.dialog_box.width_em + "em;height:"+(config.dialog_box.height_em-15.25)+"em;";
			config.dialog_box.send_msg_box_css+="top:"+(config.dialog_box.height_em-4.75)+"em;";
			config.dialog_box.input_css+=";width:"+((config.dialog_box.width-(mobile?30:20))/(mobile?16:12))+"em !important";
			
			config.dialog_box.tab_cover_css="top:7.666em;left:"+(config.dialog_box.width_em-(jGo.mobile?5:70/12))+"em;";
			config.dialog_box.up_tab_css="top:9.333em;left:"+(config.dialog_box.width_em-(jGo.mobile?40/12:50/12))+"em";
			config.dialog_box.down_tab_css="top:10.417em;left:"+(config.dialog_box.width_em-(jGo.mobile?40/12:50/12))+"em";

		}else{
			config.dialog_box.userlist_box_css+=";border-bottom:0em dotted #444444;border-left:.083em dotted #444444;width:20.833em;left:"+(config.dialog_box.width_em-20.833)+"em;height:"+(config.dialog_box.height_em-3.333)+"em;";
			config.dialog_box.view_msg_box_css+="top:3.417em;left:0em;width:"+(config.dialog_box.width_em-20.833)+"em;height:"+(config.dialog_box.height_em-8.417)+"em;";
			config.dialog_box.send_msg_box_css+=";width:"+(config.dialog_box.width_em-20.833)+"em;top:"+(config.dialog_box.height_em-4.75)+"em;";
			config.dialog_box.input_css+=";width:"+(config.dialog_box.width_em-20.833-(mobile?2.5:1.75))+"em !important";
			
			config.dialog_box.tab_cover_css="display:none;";
			config.dialog_box.up_tab_css="display:none;";
			config.dialog_box.down_tab_css="display:none;";
		}
		
	};
	
	jGo.fcchat_toolbar.chatbox.create = function(id){init(id);return create_menu_item();};
	jGo.fcchat_toolbar.chatbox.create_mobile_layout = function(id){init(id,1);return disable_toolbar_disc_mobile();};
	jGo.fcchat_toolbar.chatbox.create_dialogs = function(){return create_dialog();};
	jGo.fcchat_toolbar.chatbox.append_dialogs = function(content){return append_dialog(content);};
	jGo.fcchat_toolbar.chatbox.tgl_dialog = function(){return tgl_dialog();};
	jGo.fcchat_toolbar.chatbox.set_more_msgs = function(count){return set_more_msgs(count);};
	
	var create_menu_item = function(){
  	  	return"<div class='fc_disc_button' style='position: absolute;width:"+config.menu_item.width+"px;top:0px;left:0px;'>" +
				disable_toolbar_disc() +
  			"</div>";
  	};
	var create_dialog = function(){
		  dialog= "<div class='jGo_app jGo_myapp jGo_em jGo_dialog' id='fc_page_discussion_dialog' style='position:absolute;display: none;visibility: visible;"+config.dialog_box.css+";text-align:left;height:"+config.dialog_box.height_em+"em;width:"+config.dialog_box.width_em+"em;top: 113px; left:210px; z-index:" + z_b + ";overflow:hidden;'>" +
			"</div>";
			return dialog;
	};
	var render_dialog_content = function(){
		if(rendered==0){
			var content="<div id='fc_page_disc_title' style='position:absolute;width:" + config.dialog_box.width_em + "em;" + config.dialog_box.title_box_css + ";overflow:hidden'><div style='padding:.583em;'><a style='"+close_icon_style+"' href='javascript:jGo.fcchat_toolbar.chatbox.tgl_dialog()'>x</a><span style='" + config.dialog_box.text.title_css + "'>" + (page_tags.title_text) + "</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" +
			"<a style='" + config.dialog_box.text.link_css + "' HREF='javascript:void' onclick=\"return fc_chat.toggleMenu(this," + fc_chat.uid + ",'pg_info');\">"+__(467,'Info')+"</a>&nbsp;&nbsp;&nbsp;" +
			"<a style='" + config.dialog_box.text.link_css + "' "+_hrf+"clr_disc()'>" + __(273,'Clear') + "</a></div></div>" +
			"<div id='fc_disc_userlist_wrapper' style='position:absolute;width:" + config.dialog_box.width_em + "em;" + config.dialog_box.userlist_box_css + ";overflow:auto'><div id='fc_disc_userlist' style='padding:.25em;overflow:auto;overflow-x:hidden;" + config.dialog_box.text.css + "'>" + 
			"</div></div>" +
			"<div id='fc_tab_cover' style='position: absolute;" + config.dialog_box.tab_cover_css + ";'></div>" +
			"<div id='fc_disc_up' class='fc_drag_disc' style='position: absolute;" + config.dialog_box.up_tab_css + ";background-size: 21.666em 19.167em;background-image: url(" + _h + "chatelems1.gif); background-repeat: no-repeat; width: 1.25em; height:.583em; background-position: -8.25em -11.417em;cursor:pointer;'></div>" +
			"<div id='fc_page_chat_wrapper' style='position:absolute;" + config.dialog_box.view_msg_box_css + ";overflow:auto'><div id='fc_page_chat' style='padding:.25em;overflow:auto;line-height:1'>" +
			add_page_start()+
			"</div></div>" +
			"<div id='fc_disc_down' class='fc_drag_disc' style='position: absolute;" + config.dialog_box.down_tab_css + ";background-size: 21.666em 19.167em;background-image: url(" + _h + "chatelems1.gif); background-repeat: no-repeat;width: 1.25em; height:.666em; background-position: -9.917em -11.417em;cursor:pointer;'></div>" +
			"<div id='fc_send_page_chat' style='position:absolute;width:" + config.dialog_box.width_em + "em;" + config.dialog_box.send_msg_box_css + ";overflow:hidden'>" +
					"<div style='height:1.333em;padding:.5em'>" +
					(page_tags.topic_closed||page_tags.lock_all_discussions?"<span style='font-wieght:bold;"+config.dialog_box.text.info+"'>"+__(468,'This chat topic is closed')+"</span>":
					"<a id='fc_bld' style='font-size:1em;margin-left:.083em' href=\"javascript:fc_chat.insertTags(\'"+__(37)+"\',\'"+__(37)+"\',\' "+__(23)+" \',4);\" border=0>" +
	        		"<img title='"+__(23)+"' style='width:1.333em;height:1.333em;"+icon_css+"' id='fc_e_bld' src='"+_h+"text_bold.png'>" +
	        		"</a>" +
	        		
	        		"<a id='fc_it' style='font-size:1em;margin-left:.083em' href=\"javascript:fc_chat.insertTags(\'"+__(38)+"\',\'"+__(38)+"\',\' "+__(24)+" \',4);\" border=0>" +
	        		"<img title='"+__(24)+"' style='width:1.333em;height:1.333em;"+icon_css+"' id='fc_e_it' src='"+_h+"text_italic.png'>" +
	        		"</a>" +
	        		
	        		"<a id='fc_uln' style='font-size:1em;margin-left:.083em' href=\"javascript:fc_chat.insertTags(\'"+__(39)+"\',\'"+__(39)+"\',\' "+__(25)+" \',4);\" border=0>" +
	    			"<img title='"+__(25)+"' style='width:1.333em;height:1.333em;"+icon_css+"' id='fc_e_uln' src='"+_h+"text_underline.png'>" +
	    			"</a>" +
	        		
	        		"<a id='fc_img' style='font-size:1em;margin-left:.166em' href=\"javascript:fc_chat.insertTags(\'[[\',\']]\',\'"+__(36)+"\',4);\" border=0>" +
	        			"<img title='"+__(26)+"' style='width:1.333em;height:1.333em;' id='fc_e_img' src='"+_h+"image_1.png'>" +
	        		"</a>" +
	        		
	        		"<a class='fc_tools_a' style='font-size:1em;margin-left:.166em' href=\"javascript:fc_chat.tgl_tools(0,"+FCChatConfig.styles.chat_window.main_panel.tools_panel.smileys.width+","+FCChatConfig.styles.chat_window.main_panel.tools_panel.smileys.height+",4)\">" +
	    			"<img id='fc_e_sml3' style='width:1.333em;height:1.333em;' src='"+_h+"emoticon_smile.png'>" +
	    			"</a>" +
	    			(FCChatConfig.upload_images_enabled?"<a id='fc_imgu' style='font-size:1em;margin-left:.166em;' href=\"javascript:fc_chat.launch_uploads();\">" +
	    				"<img style='width:1.333em;height:1.333em;' title='" +__(27) + "'src='" + _h + "upload_image.png'>" +
	        			"</a>":"") +
	    			(FCChatConfig.change_avatar?"<a id='fc_avu' style='font-size:1em;margin-left:.166em;' href=\"javascript:fc_chat.launch_avatar();\">" +
    					"<img style='width:1.333em;height:1.333em;' title='" +__(29) + "'src='" + _h + "add_avatar.png'>" +
    					"</a>":"") +
	    			(FCChatConfig.transliteration_enabled?
    		    		"<a  id='fc_trlit' style='font-size:1em;margin-left:.166em;' "+_hrf+"open_trlit()'>" +
    		    			"<img style='width:1.333em;height:1.333em;' title='" + __(304,"Type in your language") + "' src='" + _h + "google_transliteration.png'>" +
    		    		"</a>":"") +
		    		"<a title='"+__(295,"doodlepad")+"' id='fc_note' style='font-size:1em;margin-left:.166em' "+_hrf+"note(1)'>" +
						"<img style='width:1.333em;height:1.333em;' src='" + _h + "pencil.png'>" +
					"</a>"+
		    		"<a title='" + __(311,"Share a document") + "' id='fc_doc' style='font-size:1em;margin-left:.166em;' "+_hrf+"doc(2)'>" +
		    				"<img style='width:1.333em;height:1.333em;'  src='" + _h + "document.png'>" +
		    		"</a>" +
		    		
		    		"<a id='fc_vid' style='font-size:1em;margin-left:.083em" + (fc_chat.vidAcc>1?"":"disabled") + "' "+_hrf+"launchVideoChat(0)'>" +
		    		"<img style='width:1.333em;height:1.333em;' title='" + __(31) + (fc_chat.vidAcc>1 ? '': ' ' +__(32)) + "' id='fc_e_vid' src='"+_h+"webcam.png'>" +
	    		    "</a>" +
					" <input id='fc_sendpagechat' class='fc_input' onKeyPress='fc_chat.oKD(event)' onKeyDown='fc_chat.oKD2(event)' type=text style='"+config.dialog_box.input_css+"'><br>") +
			"</div></div>";
			jQ("#fc_page_discussion_dialog").html(content);
			jQ('div.fc_drag_disc').bind('click',this.click_tab);
			if(mobile)jQ('#fc_sendpagechat').css({'font-size':'1.333em',height:'1.125em'});
			rendered=1;
		}
	};
	var append_dialog = function(content){
		jQ(document.body).append(content);
	};

	var tgl_dialog = function(){
		if(!fc_chat.get('login_lock')&&!fc_chat.get('l')){
			fc_chat.rescale();
			toggle = jGo.fcchat_toolbar.control.toggle_dialog(jQ("#fc_page_discussion_dialog"),position_dialog,render_dialog_content,200);
			fc_chat.tgl_disc();
			toggle_disc();
		}
	};
	var position_dialog = function(){
		jGo.fcchat_toolbar.control.position_dialog(jQ("#fc_page_discussion_dialog"),EN(jQ("#fc_chatbox_toolbar_item").css("left")),config.dialog_box.width,config.dialog_box.height*(jGo._['scalefactor']||1),(jGo.fcchat_toolbar.config.layout==2))
	};

})();

//Class Initialization
if(jGo.scripts)jGo.scripts.onLoad('chatbox.js');