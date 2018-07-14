
/////////////////////////////////////// Choose File ///////////////////////////////////////	

$('.upload input[type="file"]').on('change', function() {
  
  $('.upload-path').val(this.value.replace('C:\\fakepath\\', ''));

});




////////////////////////////////////// Add Avatar Photo ////////////////////////////////// 	
					   
$(document).ready(function(){
	
	$('.upload').click(function(){
    var file_data = $('.sortpicture').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
                                
		$.ajax({
			url: 'photo_ajax.php',  
			dataType: 'text',  
			cache: false,
			contentType: false,
			processData: false,
			dataType:"json",
			
			data: form_data,                         
			type: 'post',
			
			success: function(x){
				
				console.log(x)
				if(x == "no"){
					$("#eror").text("The field is empty")
				}
				else if(x == "eror"){
					$("#eror").text("The format of the image should be jpg, jpeg.")
					
				}
				
				
				
				$(".avatar_src").attr("src","images/"+x['id']+"/"+x['image']+"")
				
			}
		});
	});
	
								
								
//////////////////////////////////// Add Friend /////////////////////////////////////////// 

	$(".friend").click(function(){
	
		var user_id = $(this).attr("user_id");
		var search_id = $(this).attr("search_id");
		var add_friend =  0;
		
		
		console.log(user_id)
		console.log(search_id)
		if(user_id == search_id){
			
		}else{
			
			
			$.ajax({
				url:'friend_ajax.php',
				method:'POST',
				data:{user_id,search_id,add_friend},
				success:function(x){
					
					
					
				
				
				}
		
		
			})
			
			if($(this).text() ==  'Friends'){
				
			}else if($(this).text() ==  "Add Friend"){
				$(this).css({"background-color": "#26a69a","border-color":"#26a69a",})
			}
			
			
		
		}
		
		
	
	})
	
	
///////////////////////////////////// Edit ////////////////////////////////////////////	
	
	$(".edit_first").click(function(){
		gender = $(".first_span").text()
		
		$(".first_span").replaceWith("<input type='text' value='' class='first_inp'>")
		$(".first_inp").val(gender)
		$(".first_save").css({"display":"block"})
		
	})
	
	
	$(".first_save").click(function(){
		first_val = $(".first_inp").val()
		user_id = $(this).attr("user_id")
		
		$.ajax({
			url:'edit.php',
			method:'POST',
			data:{first_val,user_id},
			dataType:"json",
			success:function(x){
				console.log(x)
				$(".first_inp").replaceWith("<span class='first_span'> "+x+" </span>")
				$(".first_save").css({"display":"none"})
				$(".firstnames").text(""+x+"")	
					
					
				
				
			}
		
		
		})
		
	})
	
	

	
	
////////////////////////////////////Open  Friend Requests//////////////////////////////////
	
	$(".friend_requests").click(function(e){
		e.stopPropagation()
		$(".sidebar-friend").toggle()
		
		
			
		
	})
	
	$(".st-container").click(function(){
		
		$(".sidebar-friend").hide()
		
	})
	
	
	
	
	
	
////////////////////////////////////////////Add Friend///////////////////////////////////// 
	$(".add_f").click(function(){
		
		var user_id = $(this).attr("user_id");
		var search_id = $(this).attr("search_id");
		
		var add_friend = 1;
		
		$.ajax({
			url:'add_friend_updaet.php',
			method:'POST',
			data:{user_id,search_id,add_friend},
			success:function(x){
					
					
					
				
				
			}
		
		
		})
		
		$(this).parent().parent().parent().parent().remove()
		$(".friend_count").remove()
	
	})
	
	
	
//////////////////////////////////////////////Remove friend//////////////////////////////////
	
	$(".remove_f").click(function(){
		var user_id = $(this).attr("user_id");
		var search_id = $(this).attr("search_id");
		
		
		var add_friend = "del";
		
		$.ajax({
			url:'add_friend_updaet.php',
			method:'POST',
			data:{user_id,search_id,add_friend},
			success:function(x){
					
					
					
				
				
			}
		
		
		})
		
		$(this).parent().parent().parent().parent().remove()
		$(".friend_count").remove()
	
	})
	

////////////////////////////////////// Open  Message Requests ///////////////////////////
	
	
	
	
	
	$(".message_request").click(function(e){
		
		
		e.stopPropagation()
		$(".sidebar_chat").toggle()
		
		user_id = $('.chat_enter').attr("user_id")
		
			$.ajax({
			url:'mess_count.php',
			method:'POST',
			data:{user_id},
			dataType:"json",
			success:function(z){
				
				
					var myObj= z
					var count = Object.keys(myObj).length;
					var len = (count-1);
				$(".chat_box").remove()
				for(i=0; i< len; i++){
					$(".chat-contacts").append("<li class='online away chat_box chat_window_b chat_block_"+i+"' friend_id='"+z[""+i+""]['id']+"' user_id='"+z['user_id']+"'>  </li>")
					
					$(".chat_block_"+i+"").append("<a  href='#'  class='as_block_"+i+"'> </a>")
					
					$(".as_block_"+i+"").append("<div class='media media_block_"+i+"'> </div>")
					
					
					$(".media_block_"+i+"").append("<div class='pull-left pull_block"+i+"'> </div>")
					$(".pull_block"+i+"").append("<img src='images/default_avatar/male.jpg' width='40' height='40' class='img-circle img_block_"+i+"'>")
					$(".media_block_"+i+"").append("<div class='media-body body_block_"+i+"'> </div>")
					$(".body_block_"+i+"").append("<div class='contact-name'>"+z[""+i+""]['firstname']+" "+z[""+i+""]['lastname']+"</div>")
					
				
					
					
					if(z[""+i+""]['image']=="no"){
				
						if(z[""+i+""]['gender']== "male"){
							$(".img_block_"+i+"").attr("src","images/default_avatar/male.jpg")
						}else if(z[""+i+""]['gender']== "female"){
							$(".img_block_"+i+"").attr("src","images/default_avatar/female.jpg")
						}
					
					
					}else{
						
						$(".img_block_"+i+"").attr("src","images/"+z[""+i+""]['id']+"/"+z[""+i+""]['image']+"")
								
								
					}
					
					
					if(z[""+i+""]['online']=="0"){
						
					}else if(z[""+i+""]['online']=="1"){
						$(".pull_block"+i+"").append("<span class='status'></span>")
					}
					
						
						if(z[""+i+""]['chat_count'] != "0"){
						
							$(".chat_block_"+i+"").append("<span class='chat_num'>"+z[""+i+""]['chat_count']+" </span>")
						
						}
						
					
					
					
					
					
					
				
				
				}
			
			
			
			
			
			}
			
		
		})
		
		
		
		
	
	
	
	})
	
	
	
	$(".st-container").click(function(){
		
		$(".sidebar_chat").hide()
		
	})
	
	
	
	
///////////////////////////////// Message /////////////////////////////////////////////////
	
	
	
	$(document).on("click",  "li.chat_box", function(){
		$(".md").remove()
		$(".chat_window").css({"display":"block"})
		friend_id = $(this).attr("friend_id")
		user_id = $(this).attr("user_id")
		
		$(".chat_num").text("")
		
		$.ajax({
			url:'chat_box.php',
			method:'POST',
			data:{friend_id,user_id},
			dataType:"json",
			success:function(z){
					
				
				
				
				console.log(z)
				
				if(z['friend_image']=="no"){
					
					if(z['friend_gender']== "male"){
						$(".chat_img").attr("src","images/default_avatar/male.jpg")
					}else if(z['friend_gender']== "female"){
						$(".chat_img").attr("src","images/default_avatar/female.jpg")
					}
				
				
				}else{
					$(".chat_img").attr("src","images/"+z['friend_id']+"/"+z['friend_image']+"")
				}	
				
				
				
				$(".chat_name").text(""+z['friend_first']+" "+z['friend_last']+"")
				$(".chat_enter").attr("receiver_id",""+z['friend_id']+"")
					
					
					
						
				if(z['0'] == undefined){
					$(".medias").remove()
					
					
				
				
				}else{
					
					
					
					
					
					
					
					var myObj= z
					var count = Object.keys(myObj).length;
					var len = (count-10);
					
						
					for(var j =0; j<len; j++){
						$(".media_"+j+"").remove()
						$(".media_"+z[""+j+""]['id']+"").remove()
						
						if(user_id == z[""+j+""]['user_id']){
							
							$(".pan_bod").append("<div class='media_"+j+" md'> </div>")
							$(".media_"+j+"").append("<div class='media-left_"+j+"'> </div>")
							$(".media-left_"+j+"").append("<img src='images/guy-5.jpg' class='img-circle box_imgr' width='25'>")
							$(".media_"+j+"").append("<div class='media-body_"+j+"'> </div>")
							$(".media-body_"+j+"").append("<div class='message mg'>"+z[""+j+""]['inp_val']+"</div>")
							$(".media-body_"+j+"").append("<span class='time_data'>"+z[""+j+""]['time']+"</span>")
							
							
							
							$(".media-left_"+j+"").css({"float":"left",})
							$(".media-body_"+j+"").css({"display":"table-cell", "vertical-align": "top",})
							$(".mg").css({"background":"#26a69a",})
							$(".media_"+j+"").css({"overflow":"hidden","padding-bottom": "10px",})
							
							
							
								
							
							if(z['us_image']=="no"){
				
								if(z['us_gender']== "male"){
									$(".box_imgr").attr("src","images/default_avatar/male.jpg")
								}else if(z['us_gender']== "female"){
									$(".box_imgr").attr("src","images/default_avatar/female.jpg")
								}
					
					
							}else{
								
								$(".box_imgr").attr("src","images/"+z[""+j+""]['user_id']+"/"+z['us_image']+"")
								
								
							}
							
						
						
						
						}else if(user_id == z[""+j+""]['receiver_id']){
							
							$(".pan_bod").append("<div class='media_"+j+" md'> </div>")
							$(".media_"+j+"").append("<div class='media-left_"+j+"'> </div>")
							
							$(".media_"+j+"").append("<div class='media-body_"+j+"'> </div>")
							$(".media-body_"+j+"").append("<div class='message mg_dr'>"+z[""+j+""]['inp_val']+"</div>")
							$(".media-body_"+j+"").append("<span class='time_data'>"+z[""+j+""]['time']+"</span>")
							
							$(".media-left_"+j+"").append("<img src='images/guy-5.jpg' class='img-circle box_imgs' width='25'>")
							
							$(".media_"+j+"").css({"overflow":"hidden", "padding-bottom": "10px",})
							$(".media-left_"+j+"").css({"float":"right",})
							$(".media-body_"+j+"").css({"display":"table-cell", "vertical-align": "top", "float":"right",})
								
							
						
								
								
							
							
							
							if(z['friend_image']=="no"){
				
								if(z['friend_gender']== "male"){
									$(".box_imgs").attr("src","images/default_avatar/male.jpg")
								}else if(z['friend_gender']== "female"){
									$(".box_imgs").attr("src","images/default_avatar/female.jpg")
								}
					
					
							}else{
								
								$(".box_imgs").attr("src","images/"+z[""+j+""]['user_id']+"/"+z['friend_image']+"")
								
								
							}
							
						
						}
					
							
							
			
							
					}
				
				
				}		
						
						
						
						


					
				
				
			
			
			
			}
		
		
		})
	
	})
	
	
	
	
	
	
	
/////////////////////////////////// Message Insert /////////////////////////////////////////
	
	
	
	$(document).on("click", "li.chat_window_b", function(){
		var friend_id = $(this).attr("friend_id")
		var user_id = $(this).attr("user_id")
		
		setInterval(function(){
			$.ajax({
			
				url:'chat_select.php',
				method:'POST',
				data:{friend_id,user_id},
				dataType:"json",
				success:function(z){
					
					console.log(z)
							
						$(".pan_bod").append("<div class='media_"+z['assoc_chat']['id']+" '> </div>")
						$(".media_"+z['assoc_chat']['id']+"").append("<div class='media-left_"+z['assoc_chat']['id']+"'> </div>")
						
						$(".media_"+z['assoc_chat']['id']+"").append("<div class='media-body_"+z['assoc_chat']['id']+"'> </div>")
						$(".media-body_"+z['assoc_chat']['id']+"").append("<div class='message mg_dr'>"+z['assoc_chat']['inp_val']+"</div>")
						$(".media-body_"+z['assoc_chat']['id']+"").append("<span class='time_data'>"+z['assoc_chat']['time']+"</span>")
						
						$(".media-left_"+z['assoc_chat']['id']+"").append("<img src='images/guy-5.jpg' class='img-circle box_imgs' width='25'>")
						
						$(".media_"+z['assoc_chat']['id']+"").css({"overflow":"hidden",})
						$(".media-left_"+z['assoc_chat']['id']+"").css({"float":"right",})
						$(".media-body_"+z['assoc_chat']['id']+"").css({"display":"table-cell", "vertical-align": "top", "float":"right",})
							
						
					
							
							
						
						
						
						if(z['image']=="no"){
			
							if(z['gender']== "male"){
								$(".box_imgs").attr("src","images/default_avatar/male.jpg")
							}else if(z['gender']== "female"){
								$(".box_imgs").attr("src","images/default_avatar/female.jpg")
							}
				
				
						}else{
							
							$(".box_imgs").attr("src","images/"+z['assoc_chat']['user_id']+"/"+z['image']+"")
							
							
						}
				
				
					
				
				}
			})
		},2000)
		
	})
	
	
	$('.chat_enter').keypress(function (e) {
		 var key = e.which;
		
		if(key == 13){	
		
		
			inp_val = $('.chat_enter').val()
			user_id = $('.chat_enter').attr("user_id")
			receiver_id = $('.chat_enter').attr("receiver_id")
			
			
			function addZero(i) {
				if (i < 10) {
					i = "0" + i;
				}
				return i;
			}
			
			var dt = new Date();
			var time = addZero(dt.getHours()) + ":" + addZero(dt.getMinutes()) + ":" + addZero(dt.getSeconds());
			
			
			var d = new Date();
			var date =  addZero(d.getDate()) + "." + addZero((d.getMonth()+1)) + "." + addZero(d.getFullYear())
			
			
			
			
				
				$.ajax({
				url:'chat.php',
				method:'POST',
				data:{user_id, receiver_id, inp_val,time, date},
				dataType: "json",
				 success:function(z){
						
						
						
						
						
						
						
						$(".pan_bod").append("<div class='media_"+z['assoc_chat']['id']+"'> </div>")
						$(".media_"+z['assoc_chat']['id']+"").append("<div class='media-left_"+z['assoc_chat']['id']+"'> </div>")
						$(".media-left_"+z['assoc_chat']['id']+"").append("<img src='images/guy-5.jpg' class='img-circle box_imgr' width='25'>")
						$(".media_"+z['assoc_chat']['id']+"").append("<div class='media-body_"+z['assoc_chat']['id']+"'> </div>")
						$(".media-body_"+z['assoc_chat']['id']+"").append("<div class='message mg'>"+z['assoc_chat']['inp_val']+"</div>")
						$(".media-body_"+z['assoc_chat']['id']+"").append("<span class='time_data'>"+z['assoc_chat']['time']+"</span>")
						
						$(".media-left_"+z['assoc_chat']['id']+"").css({"float":"left",})
						$(".media-body_"+z['assoc_chat']['id']+"").css({"display":"table-cell", "vertical-align": "top",})
						$(".mg").css({"background":"#26a69a",})
						$(".media_"+z['assoc_chat']['id']+"").css({"overflow":"hidden",})
							
						
						if(z['image']=="no"){
			
							if(z['gender']== "male"){
								$(".box_imgr").attr("src","images/default_avatar/male.jpg")
							}else if(z['gender']== "female"){
								$(".box_imgr").attr("src","images/default_avatar/female.jpg")
							}
				
				
						}else{
							
							$(".box_imgr").attr("src","images/"+z['assoc_chat']['user_id']+"/"+z['image']+"")
							
							
						}
						
					
					
				
				
				
				
				}
		
		
			})
				
				
				
			
			
			
			$('.chat_enter').val("")
			
		}
	
	
	}); 
	
	$(".close").click(function(){
		$(".chat_window").hide()
		
	})
	
	

	
	
})












