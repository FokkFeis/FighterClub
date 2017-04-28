// This function lets admins see user info and all bets.
$(function() {
  $('#allUsersButton').on('click', function(){
    $('#displayBox').html('');
    $.ajax(url + "/home/allUsers")
      .done(function(result) {
        $('#displayBox').html(result);
      })
      .fail(function(){
        $('#displayBox').html("We've incountered an SQL error, contact the system owner");
      });
  });

  $('#allBetsButton').on('click',function(){
    $('#displayBox').html('');
    $.ajax(url + "/home/allBets")
      .done(function(result) {
        $('#displayBox').html(result);
      })
      .fail(function(){
        $('#displayBox').html("We've incountered an SQL error, contact the system owner");
      });
  });
  
  $('#addFighterButton').on('click',function(){
    $('#displayBox').html('');
    $.ajax(url + "/home/addFighter")
      .done(function(result) {
        $('#displayBox').html(result);
      })
      .fail(function(){
        $('#displayBox').html("We've incountered an SQL error, contact the system owner");
      });
  });

  //draggable for the arena.

});
