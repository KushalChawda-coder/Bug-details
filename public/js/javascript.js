 $(document).ready(function(){
   const myTimeout = setTimeout(myGreeting, 2000);

    function myGreeting() {
      $("#message").slideUp("slow");
    }
    $('.myImg').click(function(){
      $('#myModal').css("display", "block");
        $("#img01").attr("src", this.src);
    })
      $('.close').click(function(){
      $('#myModal').css("display", "none");
    })


     $(".bug_priority").click(function(){
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
         });

        text=$(this).text();
         $(this).parents('.parent').siblings('.btn_text').text(text);
         bug_id=$(this).parents('.parent').siblings('.btn_val').val();
         text=$(this).attr("tabindex");
         myArray = text.split(" ");
         value=myArray[0];
         key=myArray[1];
           $.ajax({
          url: '/user_update',
          type: 'POST',
          data: {
            value:value,
            key:key,
            bug_id:bug_id 
          },
          success: function(data) {
            if (data) {
              alert("successfully update !!");
            }
          }
       });
     })

    displayval=$("#display").val();
    if (displayval != "") {
       $("#exampleModal").attr("style", "display:block;background-color: rgba(0,0,0,0.6);");
       $("#exampleModal").addClass('modal fade show');
       $("#fade_all").addClass('modal-open');
       $("#fade_all").attr("style","overflow:hidden;")
    } else {
       $("#exampleModal").attr("style", "display:none;");
       $("#exampleModal").addClass('modal fade');
    }
     $('.btn-close').click(function(){
          $("#exampleModal").attr("style", "display:none;");
       $("#exampleModal").addClass('modal fade');
    })


     // comment ajax code 

      var oriVal;
      $(".comment").on('dblclick', function () {
          oriVal = $(this).text();
          $(this).text("");
          $("<textarea wrap='on'  rows='2'></textarea>").appendTo(this).val(oriVal).focus();
      });

      $(".comment").on('focusout', 'textarea', function () {
          bug_id=$(this).parent('.comment').attr("tabindex");
  
         $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
         });

          var $this = $(this);
           $this.parent().text($this.val().replace(/\n/g, ) || oriVal);
           $this.remove(); 
          update_text=$(this).val();
          key='comment';
           
          $.ajax({
          url: '/user_update',
          type: 'POST',
          data: {
            value:update_text,
            key:key,
            bug_id:bug_id 
          },
          success: function(data) {
            if (data) {
              alert("Successfully updated :)");
            }
          }
       });
         
      });


  })





