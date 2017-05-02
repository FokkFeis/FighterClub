var fighter1_mmr =0;
var fighter2_mmr =0;
var selectedFighter1;
var selectedFighter2;
var diff;
var fighter1_roll;
var fighter2_roll;
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
  })
  .trigger("change");

//work in progress
var showFighterInfo = function(jsonData,selector){
  var fighterObj = jQuery.parseJSON(jsonData);
  if (selector === 1) {
    $("#fighter1").html(`
      <p>Name: ${fighterObj.FighterName}</p>
      <p>Strength: ${fighterObj.strength}</p>
      <p>Wins: ${fighterObj.wins}</p>
      <p>League: ${fighterObj.League}</p>`
    );
    var tempMMR =fighterObj.strength;
    fighter1_mmr = tempMMR;
    selectedFighter1 = fighterObj.FighterName;
  }else {
    $("#fighter2").html(`
      <p>Name: ${fighterObj.FighterName}</p>
      <p>Strength: ${fighterObj.strength}</p>
      <p>Wins: ${fighterObj.wins}</p>
      <p>League: ${fighterObj.League}</p>`
    );
    var tempMMR =fighterObj.strength;
    selectedFighter2 = fighterObj.FighterName;
    fighter2_mmr = tempMMR;
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
    function isWinner(fighter1,fighter2){
      if(fighter1 > fighter2){
        console.log(selectedFighter1);
        fighter1wins += 1;
        roundWinner[round] = String(selectedFighter1);
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
        setTimeout( fight, 3000 );
    }
}


$('#fightButton').on('click',function(){
  roundWinner = [];
  round = 0;
  fight();

})
