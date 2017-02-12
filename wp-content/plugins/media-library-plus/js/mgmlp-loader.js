jQuery(document).ready(function(){	
		        		
    jQuery("#add-images-to-gallery").click(function(){      
      jQuery(".mgmlp-folder").removeAttr('checked');  
      jQuery(".mgmlp-folder").prop("checked", false);
      jQuery(".mgmlp-folder").prop('disabled', true);
    });
								
    jQuery("#add-new_attachment").click(function(){      
      jQuery(".mgmlp-folder").prop('disabled', false);
    });
    
    jQuery("#add-new-folder").click(function(){      
      jQuery(".mgmlp-folder").prop('disabled', false);
    });
    
    jQuery("#rename-file").click(function(){
      jQuery(".mgmlp-folder").prop("checked", false);
      jQuery(".mgmlp-folder").prop('disabled', false);
      jQuery(".mgmlp-folder").removeAttr('checked');  
      jQuery(".mgmlp-folder").attr("disabled", true);
    });
    
    jQuery("#copy-files").click(function(){      
      jQuery(".mgmlp-folder").prop("checked", false);
      jQuery(".mgmlp-folder").prop('disabled', true);
    });
    
    jQuery("#move-files").click(function(){      
      jQuery(".mgmlp-folder").prop("checked", false);
      jQuery(".mgmlp-folder").prop('disabled', true);
    });
        
    jQuery("#mgmlp-create-new-folder").click(function(){
                
      var parent_folder = jQuery('#current-folder-id').val();
      var new_folder_name = jQuery('#new-folder-name').val();
      
      if(new_folder_name.indexOf(' ') >= 0) {
        alert('Folder names cannot contain spaces.');
        return false;
      }       
      jQuery("#ajaxloader").show();
      
      jQuery.ajax({
        type: "POST",
        async: true,
        data: { action: "create_new_folder", parent_folder: parent_folder, new_folder_name: new_folder_name,   nonce: mgmlp_ajax.nonce },
        url : mgmlp_ajax.ajaxurl,
        dataType: "html",
        success: function (data) {
          jQuery("#ajaxloader").hide();          
          jQuery("#folder-message").html(data);
        },
        error: function (err)
          { alert(err.responseText);}
      });
            
    });
    
    jQuery("#select-media").click(function(){
      jQuery(".media-attachment, .mgmlp-media").prop("checked", !jQuery(".media-attachment").prop("checked"));
    });
				
    jQuery("#restore-fixed-urls").click(function(){      

      if(confirm("Are you sure you want to retore the old Media records?")) {

        jQuery("#ajaxloader").show();
      
				jQuery.ajax({
						type: "POST",
						async: true,
						url : mgmlp_ajax.ajaxurl,
						dataType: 'html',  
						data: { action: "mgmlp_restore_backup", nonce: mgmlp_ajax.nonce },
						type: 'post',
						success: function (data) {
							jQuery("#ajaxloader").hide();
							jQuery("#update-results").html(data);
						}
				 });			
			}			
    });
		
    jQuery("#delete-media-library-backup").click(function(){      

      if(confirm("Are you sure you want to remove the backedup Media records?")) {
			
				jQuery("#ajaxloader").show();

				jQuery.ajax({
						type: "POST",
						async: true,
						url : mgmlp_ajax.ajaxurl,
						dataType: 'html',  
						data: { action: "mgmlp_remove_backup", nonce: mgmlp_ajax.nonce },
						type: 'post',
						success: function (data) {
							jQuery("#ajaxloader").hide();
							jQuery("#scan-results").html(data);
						}
				 });
		 }
    });
		            
    jQuery("#mgmlp_ajax_upload").click(function(){
        
      var folder_id = jQuery('#folder_id').val();      
      var file_data = jQuery('#fileToUpload').prop('files')[0];   
      var form_data = new FormData();                  
      
      form_data.append('file', file_data);
      form_data.append('action', 'upload_attachment');
      form_data.append('folder_id', folder_id);
      form_data.append('nonce', mgmlp_ajax.nonce);
      jQuery("#ajaxloader").show();
      
      jQuery.ajax({
          url : mgmlp_ajax.ajaxurl,
          dataType: 'html',  
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,                         
          type: 'post',
          success: function (data) {
            jQuery("#ajaxloader").hide();
            jQuery("#mgmlp-file-container").html(data);
            jQuery('#fileToUpload').val("");
          }
       });
            
    });


        
    jQuery("#delete-media").click(function(){
        
        jQuery(".mgmlp-folder").prop('disabled', false);
        
        jQuery('.input-area').each(function(index) {
          jQuery(this).slideUp(600);
        });
        
        
        var delete_ids = new Array();
        jQuery('input[type=checkbox].mgmlp-media:checked').each(function() {  
          delete_ids[delete_ids.length] = jQuery(this).attr("id");
        });
        
        if(delete_ids.length === 0) {
          alert('No items were selected.');
          return false;
        }
        if(confirm("Are you sure you want to delete the selected files?")) {
          var serial_delete_ids = JSON.stringify(delete_ids.join());
          jQuery("#ajaxloader").show();
          jQuery.ajax({
            type: "POST",
            async: true,
            data: { action: "delete_maxgalleria_media", serial_delete_ids: serial_delete_ids, nonce: mgmlp_ajax.nonce },
            //var delete_data = jQuery.serialize(data);
            url : mgmlp_ajax.ajaxurl,
            dataType: "html",
            success: function (data) {
              jQuery("#ajaxloader").hide();            
              jQuery("#folder-message").html(data);
            },
            error: function (err)
              { alert(err.responseText);}
          });
      } 
    });	
		        
    jQuery("#copy-media").click(function(){
      var copy_ids = new Array();
      jQuery('input[type=checkbox].mgmlp-media:checked').each(function() {  
        copy_ids[copy_ids.length] = jQuery(this).attr("id");
      });
            
      var serial_copy_ids = JSON.stringify(copy_ids.join());
      var folder_id = jQuery('#copy-select').val();
      var destination = jQuery("#copy-select option:selected").text();
      jQuery("#ajaxloader").show();
      
      jQuery.ajax({
        type: "POST",
        async: true,
        data: { action: "copy_media", folder_id: folder_id, destination: destination, serial_copy_ids: serial_copy_ids, nonce: mgmlp_ajax.nonce },
        url : mgmlp_ajax.ajaxurl,
        dataType: "html",
        success: function (data) {
          jQuery("#ajaxloader").hide();
          jQuery(".mgmlp-media").prop('checked', false);
          jQuery(".mgmlp-folder").prop('checked', false);
          jQuery("#folder-message").html(data);
        },
        error: function (err)
          { 
            jQuery("#ajaxloader").hide();
            alert(err.responseText);
          }
      });                
    });	
    
    jQuery("#move-media").click(function(){
      var move_ids = new Array();
      jQuery('input[type=checkbox].mgmlp-media:checked').each(function() {  
        move_ids[move_ids.length] = jQuery(this).attr("id");
      });
            
      var serial_copy_ids = JSON.stringify(move_ids.join());
      var folder_id = jQuery('#move-select').val();
      var destination = jQuery("#move-select option:selected").text();
      var current_folder = jQuery("#current-folder-id").val();      
      
      jQuery("#ajaxloader").show();
      
      jQuery.ajax({
        type: "POST",
        async: true,
        data: { action: "move_media", current_folder: current_folder, folder_id: folder_id, destination: destination, serial_copy_ids: serial_copy_ids, nonce: mgmlp_ajax.nonce },
        url : mgmlp_ajax.ajaxurl,
        dataType: "html",
        success: function (data) {
          jQuery("#ajaxloader").hide();
          jQuery(".mgmlp-media").prop('checked', false);
          jQuery(".mgmlp-folder").prop('checked', false);
          jQuery("#folder-message").html(data);
        },
        error: function (err)
          { 
            jQuery("#ajaxloader").hide();
            alert(err.responseText);
          }
      });                
    });	
        
	
    jQuery("#add-to-gallery").click(function(){
      var gallery_image_ids = new Array();
      jQuery('input[type=checkbox].mgmlp-media:checked').each(function() {  
        gallery_image_ids[gallery_image_ids.length] = jQuery(this).attr("id");
      });
			
			if(gallery_image_ids.length > 0) {
            
				var serial_gallery_image_ids = JSON.stringify(gallery_image_ids.join());
				var gallery_id = jQuery('#gallery-select').val();

				jQuery("#ajaxloader").show();

				jQuery.ajax({
					type: "POST",
					async: true,
					data: { action: "add_to_max_gallery", gallery_id: gallery_id, serial_gallery_image_ids: serial_gallery_image_ids, nonce: mgmlp_ajax.nonce },
					url : mgmlp_ajax.ajaxurl,
					dataType: "html",
					success: function (data) {
						jQuery("#ajaxloader").hide();
						jQuery("#folder-message").html(data);
						jQuery(".mgmlp-media").prop('checked', false);
						jQuery(".mgmlp-folder").prop('checked', false);
					},
					error: function (err) { 
						jQuery("#ajaxloader").hide();
						alert(err.responseText);
					}
				});  
			} else {
				alert("No images were selected.")
			}
    });	
    
    jQuery("#mgmlp-rename-file").click(function(){
    
      var image_id = 0;
      var new_file_name = jQuery('#new-file-name').val();
      jQuery('input[type=checkbox].mgmlp-media:checked').each(function() {  
        // only get the first one
        //if(image_id === 0)
          image_id = jQuery(this).attr("id");
      });
      
      if(new_file_name.indexOf(' ') >= 0 || new_file_name === '' ) {
        alert('Please enter a valid file name with no spaces.');
        return false;
      }       
      
      jQuery("#ajaxloader").show();
      
      jQuery.ajax({
        type: "POST",
        async: true,
        data: { action: "maxgalleria_rename_image", image_id: image_id, new_file_name: new_file_name, nonce: mgmlp_ajax.nonce },
        url : mgmlp_ajax.ajaxurl,
        dataType: "html",
        success: function (data) {
          jQuery("#ajaxloader").hide();
          jQuery("#folder-message").html(data);
          jQuery(".mgmlp-media").prop('checked', false);
          jQuery(".mgmlp-folder").prop('checked', false);
        },
        error: function (err) { 
          jQuery("#ajaxloader").hide();
          alert(err.responseText);
        }
      });                
      
    });	
    
    jQuery("#mgmlp-sort-order").change(function() {
      var sort_order = jQuery('#mgmlp-sort-order').val();
      
      jQuery("#ajaxloader").show();
      
      jQuery.ajax({
        type: "POST",
        async: true,
        data: { action: "sort_contents", sort_order: sort_order, nonce: mgmlp_ajax.nonce },
        url : mgmlp_ajax.ajaxurl,
        dataType: "html",
        success: function (data) {
          jQuery("#ajaxloader").hide();
          jQuery("#folder-message").html(data);
          window.location.reload(true);          
        },
        error: function (err) { 
          jQuery("#ajaxloader").hide();
          alert(err.responseText);
        }
      });                
      
    });
		
    jQuery("#move-copy-switch").change(function() {
			
      var move_copy_switch = jQuery('input[type=checkbox]#move-copy-switch:checked').length > 0;
			
			if(move_copy_switch)
				move_copy_switch = 'on'
			else
				move_copy_switch = 'off'
            
      jQuery.ajax({
        type: "POST",
        async: true,
        data: { action: "mgmlp_move_copy", move_copy_switch: move_copy_switch, nonce: mgmlp_ajax.nonce },
        url : mgmlp_ajax.ajaxurl,
        dataType: "html",
        success: function (data) {
        },
        error: function (err) { 
          alert(err.responseText);
        }
      });                
    });
		        
    jQuery('#mgmlp-toolbar a').hover(function() {
       jQuery('#folder-message').html(jQuery(this).attr('help')).fadeIn(200);
    }, function() {
       jQuery('#folder-message').html('');
    });
		
    jQuery('#mgmlp-toolbar .onoffswitch').hover(function() {
       jQuery('#folder-message').html(jQuery(this).attr('help')).fadeIn(200);
    }, function() {
       jQuery('#folder-message').html('');
    });
				
    jQuery("#sync-media").click(function(){      
      var parent_folder = jQuery('#current-folder-id').val();
			var title_text = jQuery('#mlp_title_text').val();      
			var alt_text = jQuery('#mlp_alt_text').val();      
       
      jQuery("#ajaxloader").show();
      
      jQuery.ajax({
        type: "POST",
        async: true,
        data: { action: "max_sync_contents", parent_folder: parent_folder, title_text: title_text, alt_text: alt_text, nonce: mgmlp_ajax.nonce },
        url : mgmlp_ajax.ajaxurl,
        dataType: "html",
        success: function (data) {
          jQuery("#ajaxloader").hide();    
					if(data !== '0') {
            jQuery("#folder-message").html('Sync completed, ' + data + ' files and/or folders have been added');
            window.location.reload(true);          
					}	
					else {
            jQuery("#folder-message").html('Sync completed, no new files were found.');						
					}
        },
        error: function (err)
          { alert(err.responseText);}
      });
       
    });    
				
    jQuery("#seo-images").click(function(){			
			jQuery("#folder-message").text("");
    });    
		
    jQuery("#mgmlp-regen-thumbnails").click(function(){
      var image_ids = new Array();
      jQuery('input[type=checkbox].mgmlp-media:checked').each(function() {   
        image_ids[image_ids.length] = jQuery(this).attr("id");
      });
			
			if(image_ids.length < 1) {
        jQuery("#folder-message").html("No files were selected.");
				return false;
			}	
            
      var serial_image_ids = JSON.stringify(image_ids.join());
      
      jQuery("#ajaxloader").show();
      
      jQuery.ajax({
        type: "POST",
        async: true,
        data: { action: "regen_mlp_thumbnails", serial_image_ids: serial_image_ids, nonce: mgmlp_ajax.nonce },
        url : mgmlp_ajax.ajaxurl,
        dataType: "html",
        success: function (data) {
          jQuery("#ajaxloader").hide();
          jQuery(".mgmlp-media").prop('checked', false);
          jQuery("#folder-message").html(data);
        },
        error: function (err)
          { 
            jQuery("#ajaxloader").hide();
            alert(err.responseText);
          }
      });                
    });	
		
		jQuery("#mgmlp-fix-media").click(function(){
			
      jQuery("#ajaxloader").show();

      jQuery.ajax({
        type: "POST",
        async: true,
        data: { action: "mgmlp_fix_bad_urls", nonce: mgmlp_ajax.nonce },
        url : mgmlp_ajax.ajaxurl,
        dataType: "html",
        success: function (data) {
          jQuery("#ajaxloader").hide();
          jQuery("#url-fix-message").html(data);
        },
        error: function (err)
          { 
            jQuery("#ajaxloader").hide();
            alert(err.responseText);
          }
      });                			
			
    });	

		jQuery("#mlp-update-seo-settings").click(function(){
						
			var checked = "off";
			if(jQuery("#seo-images").is(":checked")) {
				checked = 'on';
			}
			var default_alt = jQuery("#default-alt").val();
			var default_title = jQuery("#default-title").val();

      jQuery.ajax({
        type: "POST",
        async: true,
        data: { action: "mlp_image_seo_change", checked: checked, default_alt: default_alt, default_title: default_title, nonce: mgmlp_ajax.nonce },
        url : mgmlp_ajax.ajaxurl,
        dataType: "html",
        success: function (data) {
          jQuery("#folder-message").html(data);
        },
        error: function (err)
          { 
            alert(err.responseText);
          }
      });                
			 			 
		});
				
  });    
        
function slideonlyone(thechosenone) {
  jQuery('.input-area').each(function(index) {
    if (jQuery(this).attr("id") == thechosenone) {
       jQuery(this).slideDown(200);
    }
    else {
       jQuery(this).slideUp(600);
    }
  });
}

var obj = jQuery("#dragandrophandler");
obj.on('dragenter', function (e) 
{
    e.stopPropagation();
    e.preventDefault();
    jQuery(this).css('border', '2px solid #0B85A1');
});
obj.on('dragover', function (e) 
{
     e.stopPropagation();
     e.preventDefault();
});
obj.on('drop', function (e) 
{
 
     jQuery(this).css('border', '2px solid #0B85A1');
     e.preventDefault();
     var files = e.originalEvent.dataTransfer.files;
 
     //We need to send dropped files to Server
     handleFileUpload(files,obj);
});


jQuery(document).on('dragenter', function (e) 
{
    e.stopPropagation();
    e.preventDefault();
});
jQuery(document).on('dragover', function (e) 
{
  e.stopPropagation();
  e.preventDefault();
  obj.css('border', '2px solid #0B85A1');
});
jQuery(document).on('drop', function (e, ui) 
{
    e.stopPropagation();
    e.preventDefault();
});

function handleFileUpload(files,obj)
{
   var folder_id = jQuery('#folder_id').val();      
	 
	 var mlp_title_text = jQuery('#mlp_title_text').val();      
	 var mlp_alt_text = jQuery('#mlp_alt_text').val();      
	 
   for (var i = 0; i < files.length; i++) 
   {
        var fd = new FormData();
        fd.append('file', files[i]);
        fd.append('action', 'upload_attachment');
        fd.append('folder_id', folder_id);
        fd.append('title_text', mlp_title_text);
        fd.append('alt_text', mlp_alt_text);
        fd.append('nonce', mgmlp_ajax.nonce);

        var status = new createStatusbar(obj); //Using this we can set progress.
        status.setFileNameSize(files[i].name,files[i].size);
        sendFileToServer(fd,status);
 
   }
}

function sendFileToServer(formData,status)
{
    jQuery("#ajaxloader").show();
    var extraData ={}; //Extra Data.
    var jqXHR=jQuery.ajax({
            xhr: function() {
            var xhrobj = jQuery.ajaxSettings.xhr();
            if (xhrobj.upload) {
                    xhrobj.upload.addEventListener('progress', function(event) {
                        var percent = 0;
                        var position = event.loaded || event.position;
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = Math.ceil(position / total * 100);
                        }
                        //Set progress
                        status.setProgress(percent);
                    }, false);
                }
            return xhrobj;
        },
        url : mgmlp_ajax.ajaxurl,
        type: "POST",
        contentType:false,
        processData: false,
        cache: false,
        data: formData,
        success: function(data){
            status.setProgress(100);
            jQuery("#ajaxloader").hide();
            jQuery("#mgmlp-file-container").html(data);
						
		        jQuery('li a.media-attachment').draggable({
							cursor: 'move',
							//helper: 'clone'
			        helper: function() {
								// allows the checkboxes to be used in multi select drag and drop
								var selected = jQuery('.mg-media-list input:checked').parents('li');
								if (selected.length === 0) {
									selected = jQuery(this);
								}
								var container = jQuery('<div/>').attr('id', 'draggingContainer');
								container.append(selected.clone());
								return container;
							}										
						});
						jQuery('.media-link').droppable( {
								accept: 'li a.media-attachment',
								hoverClass: 'droppable-hover',
								drop: handleDropEvent
						});
						
				},
        error: function (err){ 
          jQuery("#ajaxloader").hide();
          alert(err.responseText);
        }        
    }); 
 
    status.setAbort(jqXHR);
}

var rowCount=0;
function createStatusbar(obj)
{
     rowCount++;
     var row="odd";
     if(rowCount %2 ==0) row ="even";
     this.statusbar = jQuery("<div class='statusbar "+row+"'></div>");
     this.filename = jQuery("<div class='filename'></div>").appendTo(this.statusbar);
     this.size = jQuery("<div class='filesize'></div>").appendTo(this.statusbar);
     this.progressBar = jQuery("<div class='progressBar'><div></div></div>").appendTo(this.statusbar);
     this.abort = jQuery("<div class='abort'>Abort</div>").appendTo(this.statusbar);
     obj.after(this.statusbar);
 
    this.setFileNameSize = function(name,size)
    {
        var sizeStr="";
        var sizeKB = size/1024;
        if(parseInt(sizeKB) > 1024)
        {
            var sizeMB = sizeKB/1024;
            sizeStr = sizeMB.toFixed(2)+" MB";
        }
        else
        {
            sizeStr = sizeKB.toFixed(2)+" KB";
        }
 
        this.filename.html(name);
        this.size.html(sizeStr);
    }
    this.setProgress = function(progress)
    {       
        var progressBarWidth =progress*this.progressBar.width()/ 100;  
        this.progressBar.find('div').animate({ width: progressBarWidth }, 10).html(progress + "% ");
        if(parseInt(progress) >= 100)
        {            
            this.abort.hide();            
            this.statusbar.remove();
        }
    }
    this.setAbort = function(jqxhr)
    {
        var sb = this.statusbar;
        this.abort.click(function()
        {
            jqxhr.abort();
            sb.hide();
            jQuery("#ajaxloader").hide();
        });
    }
}

// for draging and droping multiple files
function handleDropEvent(event, ui ) {
			
	var move_ids = new Array();
	var items = ui.helper.children();
	items.each(function() {  
		move_ids[move_ids.length] = jQuery(this).find( "a.media-attachment" ).attr("id");
	});
	
	if(move_ids.length < 2) {
	  move_ids = new Array();
		move_ids[move_ids.length] =  ui.draggable.attr("id");
	}	
	
  var droppableId = jQuery(this).attr("folder");	
	var serial_copy_ids = JSON.stringify(move_ids.join());
	var folder_id = droppableId;
	var destination = '';
	var current_folder = jQuery("#current-folder-id").val();      

	jQuery("#ajaxloader").show();

	jQuery.ajax({
		type: "POST",
		async: true,
		data: { action: "move_media", current_folder: current_folder, folder_id: folder_id, destination: destination, serial_copy_ids: serial_copy_ids, nonce: mgmlp_ajax.nonce },
		url : mgmlp_ajax.ajaxurl,
		dataType: "html",
		success: function (data) {
			jQuery("#ajaxloader").hide();
			jQuery(".mgmlp-media").prop('checked', false);
			jQuery(".mgmlp-folder").prop('checked', false);
			jQuery("#folder-message").html(data);
		},
		error: function (err)
			{ 
				jQuery("#ajaxloader").hide();
				alert(err.responseText);
			}
	});                	
}