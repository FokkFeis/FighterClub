var fighter1_mmr =0;
var fighter2_mmr =0;
var selectedFighter1, fighter1ID, fighter2ID;
var selectedFighter2;
var diff;
var fighter1_roll;
var fighter2_roll;
var fighters;
var user_bet, user_betOn,user_won;
var fighter1wins = 0;
var fighter2wins = 0;
var fightResult;

var getFighterInfo = function(fighterName,selector) {
$.ajax({
    url: url + "/fights/ajaxGetFighter",
    type: 'GET',
    data: {fighterName:fighterName},
    success: function(data) {
        showFighterInfo(data,selector);
    },
    error: function () {
        console.log('AJAX ERROR PLES FIX');
    }
});
};

$("select")
  .change(function() {
    selectedFighter1 = $("#select1 option:selected").text();
    getFighterInfo(selectedFighter1,1);
    selectedFighter2 = $("#select2 option:selected").text();
    getFighterInfo(selectedFighter2,2);

    //Have to empty the selector options before adding others.
    $('#selBetFighter')
      .empty()
      .append('<option value="fighter1">' + selectedFighter1 + '</option>')
      .append('<option value="fighter2">' + selectedFighter2 + '</option>');

  })
  .trigger("change");

var showFighterInfo = function(jsonData,selector){
  var fighterObj = jQuery.parseJSON(jsonData);
  if (selector === 1) {
    $("#fighter1").html(`
      <li class="list-group-item">Strength: ${fighterObj.strength}</li>
      <li class="list-group-item">Wins: ${fighterObj.wins}</li>
      <li class="list-group-item">League: ${fighterObj.League}</li>`
    );

    var tempMMR =fighterObj.strength;
    fighter1_mmr = tempMMR;
    selectedFighter1 = fighterObj.FighterName;
    fighter1ID = fighterObj.ID;
  }else {
    $("#fighter2").html(`
      <li class="list-group-item">Strength: ${fighterObj.strength}</li>
      <li class="list-group-item">Wins: ${fighterObj.wins}</li>
      <li class="list-group-item">League: ${fighterObj.League}</li>`
    );

    var tempMMR =fighterObj.strength;
    selectedFighter2 = fighterObj.FighterName;
    fighter2_mmr = tempMMR;
    fighter2ID = fighterObj.ID;
  }

};

var dice = {
  sides: 6,
  roll: function () {
    var randomNumber = Math.floor(Math.random() * this.sides) + 1;
    return randomNumber;
  }
}

function getDiff(mmr1,mmr2){

  if(mmr1 < mmr2){
    diff = mmr2/mmr1;
    fighter2_roll = dice.roll() * diff;
    fighter1_roll = dice.roll();
  }
  if(mmr1 > mmr2){
    diff = mmr1/mmr2;
    fighter1_roll = dice.roll() * diff;
    fighter2_roll = dice.roll();
  }
  if(mmr1 == mmr2){
    diff = 0;
    fighter1_roll = dice.roll();
    fighter2_roll = dice.roll();
  }
}
var round = 0, howManyTimes = 3;
var fighter1wins, fighter2wins, fightTies;
var roundWinner = [];
function fight() {
    getDiff(Number(fighter1_mmr),Number(fighter2_mmr));
    if (fighter1ID == fighter2ID){
      $('#fightBox').html()
      $('#fightBox').html(String(selectedFighter1) + " Cannot fight himself/herself....");
    }
    else{
    function isWinner(fighter1,fighter2){
      if(fighter1 > fighter2){
        fighter1wins += 1;
        roundWinner[round] = String(selectedFighter1);
        // in the future we can add another table to keep track of round of fights
      }
      if(fighter1 < fighter2){
        fighter2wins += 1;
        roundWinner[round] = String(selectedFighter2);
      }
      if(fighter1 == fighter2){
        fightTies += 1;
        roundWinner[round] = "Tie";
      }
    }
    isWinner(fighter1_roll,fighter2_roll);
    $('#fightBox').html();
    $('#fightBox').html(selectedFighter1 +" Rolls " + fighter1_roll +"<br>"+selectedFighter2 + " Rolls " + fighter2_roll + "<br>round: "+ (round+1) +"<br>Fight Score: "+ roundWinner + "<br> Round Winner: "+roundWinner[round]);

    round++;
    if( round < howManyTimes ){
        setTimeout( fight, 2500 );
    }
    if(round == 3){
      if(fighter1wins > fighter2wins){
        $('#resultBox').html('<br>' + selectedFighter1 + ' Is the winner');
        fightResult= "1";
        if(user_betOn == "1"){
          user_won = "1";
        }
        if(user_betOn == "2"){
          user_won = "0";
        }
      }
      if(fighter1wins == fighter2wins){
        $("#resultBox").html('<br> The result is a tie');
      }
      else{
        $('#resultBox').html('<br>' + selectedFighter2 + ' Is the winner');
        fightResult = "2";
        if(user_betOn == "2"){
          user_won = "1";
        }
        if(user_betOn == "1"){
          user_won = "0";
        }
      }
    }
}
}

function addBetAndFight(fightResult, fighter1ID, fighter2ID, user_betOn,user_bet,user_won){
  $.ajax({
    type: "GET",
    url: "fights/ajaxAddFight",
    dataType: 'json',
    data: {fighterResult: fightResult, fighter1ID: fighter1ID, fighter2ID: fighter2ID,user_betOn: user_betOn,user_bet: user_bet,user_won: user_won},
    'success': function(data){

    }
  });
}

$('#fightButton').on('click',function(){
  roundWinner = [];
  round = 0;
  fighter1wins = 0;
  fighter2wins = 0;
  user_won = 0;
  $('#resultBox').html("");
  fight();
  addBetAndFight(fightResult, fighter1ID, fighter2ID, user_betOn,user_bet,user_won)
});

//IN PROGRESS
$('#confirmBetButton').on('click',function(){
  $('#currentBets').html("Betting on " + $("#selBetFighter option:selected").text() + " Amount: " + $("#amountToBet").val() + " CANCEL BUTTON" );
  user_bet = Number($("#amountToBet").val()); //Get amount betted
  if($("#selBetFighter option:selected").text() == selectedFighter1){
    user_betOn = '1'; //Bets on fighter 1
  }
  else{
    user_betOn = '2' //Bets on fighter 2
  }

});
