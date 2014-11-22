/*
 * TOOLBAR STYLE TEMPLATE
 *
 * This file controls aspects of FCChat's layout and appearance.
 * 
 * In this file comments are preceded by double slashes ie.
 *      //THIS IS A COMMENT
 *      
 * Refer to the product manual for info regarding how to effectively make changes to the
 * style template:
 * 
 * http://www.fastcatsoftware.com/chat/manual.html
 * 
 * To use this template, edit FCChat/config/config.js as follows:
 * 
 *  //STYLE
 *	toolbar_style_template:"toolbar_default.js",
 * 
 * If you create a decent style template. Please email us the template at 
 * support@fastcatsoftware.com
 */

(function(){
	var toolbar_base_font = "color:white;font-size:8pt;font-family:arial;font-weight:bold;";
var border_radius_4 = "-moz-border-radius: .333em;-webkit-border-radius: .333em;border-radius:.333em;";
jGo.fcchat_toolbar.style={
		height:35,
		border_height:1,
		css:"-webkit-box-shadow:0px 0px 12px 2px rgba(0,0,0,0.5);box-shadow:0px 0px 12px 2px rgba(0,0,0,0.5);background-color:gray;-moz-border-radius: 4px;-webkit-border-radius: 2px;border-radius:4px;border: 1px solid #b0b0b0;triangle-color:gray;",
		banner_css:{"background-color":"gray","border-bottom":"1px solid gray","border-top":"1px solid gray"},
		mobile_banner:{
			title:"color:green;",
			links:"background-color:darkblue;color:#fff;"
		},
		alt_css:"",
		text_size:"font-size:12px",
		text:toolbar_base_font,
		logo_css:"font-size:16px;color:#ccc;font-weight:normal;",
		dialog_box:{
			css:"-webkit-transform: translate3d(0,0,0);-webkit-box-shadow:0em 0em 1em .167em rgba(0,0,0,0.5);box-shadow:0em 0em 1em .167em rgba(0,0,0,0.5);border:.083em solid #b0b0b0;background-color:#eeeeee;",
			alt_css:"",
			title_box_css:"top:0em;left:0em;height:3.333em;background-color:gray;",
			list_divider_css:"border-bottom:.083em solid transparent;",
			select_user:{
				over_color:"#f0f9ff",
				off_color:"transparent",
				selected_color:"#d3ffd3"
			},
			user_icon:{
				online_css:border_radius_4+"background-color:#54FD74;border:.083em solid white",
				offline_css:border_radius_4+"background-color:transparent;border:.083em solid#aaaaaa",
				busy_css:border_radius_4+"background-color:yellow;border:.083em solid white",
				blocked_css:border_radius_4+"background-color:#FF8380;border:.083em solid white"
			},
			text:{
				css:"font-family:arial;color:#444444;",
				title_css:"font-weight:bold;color:white;",
				link_css:"color:lightblue;",
				disabled_css:"color:#dddddd;",
				secondary_link_css:"color:#528DC4;text-decoration:none;",
				screen_name_css:"font-family:arial;font-size:1.083em;color:green;font-weight:700;text-decoration:none;",
				timestamp_css:"color:green;",
				info:"color:gray;font-style:italic;",
				user_info_css:"color:#888888;",
				offline_css:"font-style:italic;color:green;",
				user_title_css:"font-style:italic;color:darkblue;"
			}
		},
		menus:{
			user_options:{
				position:{
					left:null,
					top:null,
					offsetLeft:0,
					offsetTop:0
				},
				css:{
					width:"16.667em",
					height:"19.167em",
					"font-size":"12px",
					"-webkit-box-shadow": ".167em .167em .167em .083em rgba(0,0,0,0.5)",
					"box-shadow": ".167em .167em .167em .083em rgba(0,0,0,0.5)",
					"background-color":"#eee",
					border:".083em solid silver"
				},
				menu_item:{
					dim:"width:16.667em;height:2.5em;",
					css:"padding:.667em;font:1.083em arial;font-weight:bold;",
					link_color:"#444444",
					link_css:"text-decoration:none",
					disabled_link_color:"#999999",
					hover_color:"#fff",
					hide_icon:{
						css:"color:#444444;font-stretch:wider;font-size:1.083em;font-weight:bold;text-decoration:none"
					}
				}
			},
			set_availability:{
				position:{
					left:null,
					top:null,
					offsetLeft:50,
					offsetTop:30
				},
				css:{
					width:"16.667em",
					height:"6.667em",
					"font-size":"12px",
					"-webkit-box-shadow": ".167em .167em .167em .083em rgba(0,0,0,0.5)",
					"box-shadow": ".167em .167em .167em .083em rgba(0,0,0,0.5)",
					"background-color":"#eeeeee",
					border:".083em solid silver"
				},
				menu_item:{
					css:"padding:.667em;font:1.083em arial;",
					hide_icon:{
						css:"color:#444444;font-stretch:wider;font-size:1.083em;font-weight:bold;text-decoration:none"
					}
				}
			},
			mod_menu:{
				position:{
					left:null,
					top:null,
					offsetLeft:40,
					offsetTop:30
				},
				css:{
					width:"16.667em",
					height:"16.667em",
					"font-size":"12px",
					"-webkit-box-shadow": ".167em .167em .167em .083em rgba(0,0,0,0.5)",
					"box-shadow": ".167em .167em .167em .083em rgba(0,0,0,0.5)",
					"background-color":"#eee",
					border:".083em solid silver"
				},
				menu_item:{
					dim:"width:16.667em;height:2.5em;",
					css:"padding:.667em;font:1.083em arial;font-weight:bold;",
					link_color:"#444444",
					link_css:"text-decoration:none",
					disabled_link_color:"#999999",
					hover_color:"#fff",
					hide_icon:{
						css:"color:#444444;font-stretch:wider;font-size:1.083em;font-weight:bold;text-decoration:none"
					}
				}
			},
			set_signature:{
				position:{
					left:null,
					top:null,
					offsetLeft:50,
					offsetTop:30
				},
				css:{
					width:"15.667em",
					height:"7.083em",
					"font-size":"12px",
					"-webkit-box-shadow": ".167em .167em .167em .083em rgba(0,0,0,0.5)",
					"box-shadow": ".167em .167em .167em .083em rgba(0,0,0,0.5)",
					"background-color":"#eeeeee",
					border:".083em solid silver"
				},
				menu_item:{
					css:"padding:.667em;font:1.083em arial;",
					set_notice:{
						css:"color:green;font-weight:bold;font-style:italic"
					},
					hide_icon:{
						css:"color:#444444;font-stretch:wider;font-size:1.083em;font-weight:bold;text-decoration:none"
					}
				}
			},
			set_nickname:{
				css:{
					"font-size":"12px",
					width:"25em",
					"-webkit-box-shadow": "0em 0em .167em .167em rgba(0,0,0,0.5)",
					"box-shadow": "0em 0em .167em .167em rgba(0,0,0,0.5)",
					"background-color":"#eeeeee",
					padding:"1.25em",
					border:".083em solid black",
					"-moz-border-radius":".167em",
					"-webkit-border-radius":".167em",
					"border-radius":".167em"
				},
				menu_item:{
					link_css:"font:1.083em arial;",
					input_css:"width:24.167em;",
					set_notice:{
						css:"color:green;font-weight:bold;font-style:italic"
					}
				}
			}
		},
		divider_css:"top:0px;width:1px;height:35px;background-color:#aaaaaa;",
		icons_16px:{
			top:10
		},
		icons_24px:{
			top:6
		},
		icon_tray:{
			width:35,
			minimize_icon:{
				top:10,
				offset:35,
				css:"color:white;font-stretch:wider;font-size:8pt;font-weight:bold;text-decoration:none;"
			},
			restore:{
				width:40
			},
			hide_icon:{
				top:10,
				offset:15,
				css:"color:white;font-stretch:wider;font-size:8pt;font-weight:bold;text-decoration:none;"
			}
		},
		toolbar_item:{
			text:{
				css:toolbar_base_font+"color:white;",
				alert_css:toolbar_base_font+"color:pink;",
				link_css:toolbar_base_font+"color:white;",
				info_css:toolbar_base_font+"color:#BFEFFF;"
			},
			buttons:{
				default_css:toolbar_base_font+"text-decoration:none;",
				states:{
					link_css:"color:white;",
					hover_css:"color:yellow;",
					disabled_css:"color:lightgray;"
				}
			},
			chatcenter_layout:{
				width:610,
				info_box:{
					width:420,
					css:"height:35px;left:10px;top:0px;",
					padding_top:11
				},
				open_chat_button:{
					top:10,
					left:465
				},
				off_button:{
					top:10,
					left:560
				},
				status:{
					top:15,
					left:438,
					css:""
				},
				divider:{
					top:0,
					left:455,
					css:"width:1px;height:35px;background-color:#aaaaaa;"
				}
			},
			msgcenter_layout:{
				width:490,
				info_box:{
					width:300,
					css:"height:30px;left:10px;top:0px;",
					padding_top:11
				},
				open_chat_button:{
					top:10,
					left:345
				},
				off_button:{
					top:10,
					left:440
				},
				status:{
					top:15,
					left:318,
					css:""
				},
				divider:{
					top:0,
					left:335,
					css:"width:1px;height:30px;background-color:#aaaaaa;"
				}
			}
		}
	};
/*Apply style overrides*/
FCChatConfig.overrides.toolbar_overrides();
}());