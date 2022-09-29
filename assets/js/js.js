$(document).ready(function(){
    // Add user
    $(document).on('click', '.user_add', function(){
      //user Info
      var name = $('#name').val();
      var number = $('#number').val();
      var email = $('#email').val();
      //Additional Info
      var timein = $('#timein').val();
      var gender = $(".gender:checked").val();
      
      $.ajax({
        url: 'manage_users_conf.php',
        type: 'POST',
        data: {
          'Add': 1,
          'name': name,
          'number': number,
          'email': email,
          'timein': timein,
          'gender': gender,
        },
        success: function(response){
          $('#name').val('');
          $('#number').val('');
          $('#email').val('');
  
          $('#timein').val('');
          $('#gender').val('');
          
          $('#alert').show();
          $('#alert').text(response);
          $.ajax({
            url: "manage_users_up.php"
            }).done(function(data) {
            $('#manage_users').html(data);
          });
        }
      });
    });