

</main>
<script>
    //upload profile photo
    jQuery(function (){
        jQuery('#form2-image-upload').click(function(){
            $("#file2").trigger('click');
        });
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profilepic2')
                    .attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#form_profile_image").on('submit', function(e) {
        e.preventDefault();
        $.User.saveProfileImage(new FormData(this));
    });



    //upload cover photo or youtubr links
    jQuery('#form3-image-upload').click(function (){
        jQuery('#file3').trigger('click');
    });
    function uploadImageCover(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var uploadCover = '<img id="profilepic3"  src="'+e.target.result+'" alt="">';
                $(".cover-image-preview").html(uploadCover);
                $("#youtubeVideo").html(uploadCover);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".youtube-save-btn").click(function() {
        var url = $('#youtube-input-url').val();
        youtube_url = url ;

        if (url != undefined || url != '') {
            var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
            var match = url.match(regExp);
            if (match && match[2].length == 11) {
                // Do anything for being valid
                // if need to change the url to embed url then use below line
                htmlStr = "<div id='youtubeVideo' style='width: 100%; height: 100%;'>";
                htmlStr += '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/' + match[2] + '?autoplay=1&enablejsapi=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
                htmlStr += "</div>";
                $(".cover-image-preview").html(htmlStr);
                $("#uploadURLmodal .close").click();
                $(".cover-image-preview img").remove();
                $('#youtube-input-url').val('');
                $(".invalid-url").removeClass('showME');

            } else {
                //alert('not valid');
                // Do anything for not being valid
                $(".invalid-url").addClass('showME');
                $('#youtube-input-url').val('');
            }
        }
        $( "#youtube-input-url" ).focus(function() {
            $(".invalid-url").removeClass('showME');
        });

    });

    //next
    $(".submit-company-form-signup").click(function() {
        $(".company-signup-form1-cont").removeClass('beVisible');
        $(".company-signup-form3-cont").addClass('beVisible');

    });

    //next
    $("#skip-form3").click(function() {
        $(".company-signup-form1-cont").addClass('beVisible');
        $(".company-signup-form3-cont").removeClass('beVisible');

    });


    $("#save_form").click(function() {

        this_element = $(this);
        this_element.append("<img src='cdn/ajax-loader.gif' class='ajax_loader_class' width='20'>");

//        var formData = $("#form3_profile_image").serializeArray();

        var formData = new FormData();

        var data =  $("#form_have_data").serializeArray()
        $.each(data, function( index, value ) {
            formData.append(value['name'], value['value']);
        });

        if(typeof(youtube_url) != "undefined" && youtube_url !== null) {
            formData.append('youtube_url', youtube_url);
        }
        formData.append('image', $('input[type=file]')[0].files[0]);


        $.ajax({
            url: $("#form_have_data").attr("action"),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                console.log(data);
                var returned_data = JSON.parse(data);
                console.log(returned_data);
                console.log(returned_data.status);

                if (returned_data.status=="Success") {
                    $('.ajax_loader_class',this_element).remove();
                    if (confirm(returned_data.message)) {

                        $(".company-signup-form1-cont").addClass('beVisible');
                        $(".company-signup-form3-cont").removeClass('beVisible');
                    }
                }

            }
        });



    });



    function submitForm(form){
        var url = form.attr("action");
        var formData = $(form).serializeArray();
        $.post(url, formData).done(function (data)
        {
            alert(data);
        }
        );
    }



//    var formData = new FormData();
//    formData.append('section', 'general');
//    formData.append('action', 'previewImg'); /
    // / Attach file formData.append('image', $('input[type=file]')[0].files[0]);

</script>


</body>
</html>






