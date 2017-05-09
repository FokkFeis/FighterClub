var fighter1_mmr = 0;
var fighter2_mmr = 0;
var selectedFighter1, fighter1ID, fighter2ID;
var selectedFighter2;
var diff;
var fighter1_roll;
var fighter2_roll;
var fighters;
var user_bet, user_betOn, user_won;
var fighter1wins = 0;
var fighter2wins = 0;
var fightResult;
var mydata;
var mmrDiffNumber;
var new_fighter1_mmr, new_fighter2_mmr;
var fightWinner;
var userCoins = Number($("#CoinsList").val());
var fightButton = $("#fightButton");
var finalBetAmount;

fightButton.hide();

var getFighterInfo = function(fighterName, selector) {
    $.ajax({
        url: url + "/fights/ajaxGetFighter",
        type: 'GET',
        data: {
            fighterName: fighterName
        },
        success: function(data) {
            showFighterInfo(data, selector);
        },
        error: function() {
            console.log('AJAX ERROR PLES FIX');
        }
    });
};
var getUserInfo = function(userID, selector) {
    $.ajax({
        url: url + "fights/getUserInfo",
        type: 'GET',
        data: {}
    });
};

$("select").not("#selBetFighter")
    .change(function() {
        selectedFighter1 = $("#select1 option:selected").text();
        getFighterInfo(selectedFighter1, 1);
        selectedFighter2 = $("#select2 option:selected").text();
        getFighterInfo(selectedFighter2, 2);

        //Have to empty the selector options before adding others.
        $('#selBetFighter')
            .empty()
            .append('<option value="fighter1">' + selectedFighter1 + '</option>')
            .append('<option value="fighter2">' + selectedFighter2 + '</option>');

    })
    .trigger("change");

var showFighterInfo = function(jsonData, selector) {
    var fighterObj = jQuery.parseJSON(jsonData);
    if (selector === 1) {
        $("#fighter1").html(`
      <li class="list-group-item">Strength: ${fighterObj.strength}</li>
      <li class="list-group-item">Wins: ${fighterObj.wins}</li>
      <li class="list-group-item">League: ${fighterObj.League}</li>`);

        var tempMMR = fighterObj.strength;
        fighter1_mmr = tempMMR;
        selectedFighter1 = fighterObj.FighterName;
        fighter1ID = fighterObj.ID;
        fighter1_league = fighterObj.League;
    } else {
        $("#fighter2").html(`
      <li class="list-group-item">Strength: ${fighterObj.strength}</li>
      <li class="list-group-item">Wins: ${fighterObj.wins}</li>
      <li class="list-group-item">League: ${fighterObj.League}</li>`);

        var tempMMR = fighterObj.strength;
        selectedFighter2 = fighterObj.FighterName;
        fighter2_mmr = tempMMR;
        fighter2ID = fighterObj.ID;
        fighter2_league = fighterObj.League;
    }

};

var dice = {
    sides: 6,
    roll: function() {
        var randomNumber = Math.floor(Math.random() * this.sides) + 1;
        return randomNumber;
    }
};

function getDiff(mmr1, mmr2) {

    if (mmr1 < mmr2) {
        diff = mmr2 / mmr1;
        fighter2_roll = dice.roll() * diff;
        fighter1_roll = dice.roll();
    }
    if (mmr1 > mmr2) {
        diff = mmr1 / mmr2;
        fighter1_roll = dice.roll() * diff;
        fighter2_roll = dice.roll();
    }
    if (mmr1 == mmr2) {
        diff = 0;
        fighter1_roll = dice.roll();
        fighter2_roll = dice.roll();
    }
}
var round = 0,
    howManyTimes = 3;
var fighter1wins, fighter2wins, fightTies;
var roundWinner = [];

function fight() {
    getDiff(Number(fighter1_mmr), Number(fighter2_mmr));
    if (fighter1ID == fighter2ID) {
        $('#fightBox').html();
        $('#fightBox').html(String(selectedFighter1) + " Cannot fight himself/herself....");
    } else {
        function isWinner(fighter1, fighter2) {
            if (fighter1 > fighter2) {
                fighter1wins += 1;
                roundWinner[round] = String(selectedFighter1);
                // in the future we can add another table to keep track of round of fights
            }
            if (fighter1 < fighter2) {
                fighter2wins += 1;
                roundWinner[round] = String(selectedFighter2);
            }
            if (fighter1 == fighter2) {
                fightTies += 1;
                roundWinner[round] = "Tie";
            }
        }
        isWinner(fighter1_roll, fighter2_roll);
        $('#fightBox').html();
        $('#fightBox').html(`
          <div class="card">
            <div class="card-block">
              <h4 class="card-title">${selectedFighter1}</h4>
              <p class="card-text">Rolls ${fighter1_roll.toFixed(2)}</p>
            </div>
          </div>
          <div class="card">
            <div class="card-block">
              <h4 class="card-title">Round: ${(round + 1)}</h4>
              <p class="card-text">
                Fight Score: ${roundWinner}<br>
            Round Winner: ${roundWinner[round]}</p>
            </div>
          </div>
          <div class="card">
            <div class="card-block">
              <h4 class="card-title">${selectedFighter2}</h4>
              <p class="card-text">Rolls ${fighter2_roll.toFixed(2)}</p>
            </div>
          </div>`);

        round++;
        if (round < howManyTimes) {
            setTimeout(fight, 2500);
        }
        if (round == 3) {
            //mmrDiffNumber = 25 / diff;
            if (Number(fighter1wins) > Number(fighter2wins)) {
                $('#resultBox').html('<br> <h1 class="text-success"> The Winner is: ' + selectedFighter1 + '!</h1>');
                fightResult = "1";
                if (user_betOn == "1") {
                    user_won = "1";
                    finalBetAmount = Number(Number(user_bet) / Number(diff));
                    $('#resultBox').append('Congratulations you won: ' + finalBetAmount.toFixed(0));

                }
                if (user_betOn == "2") {
                    user_won = "0";
                    finalBetAmount = user_bet;
                    $('#resultBox').append('Too bad! you lost: ' + finalBetAmount.toFixed(0));
                }
                if (diff == 0) {
                    new_fighter1_mmr = Number(Number(fighter1_mmr) + Number(25));
                    new_fighter2_mmr = Number(Number(fighter2_mmr) - Number(25));
                } else {
                    new_fighter1_mmr = Number(Number(fighter1_mmr) + Number(25 / diff));
                    new_fighter2_mmr = Number(Number(fighter2_mmr) - Number(25 / diff));
                }
                fightWinner = Number(fighter1ID);
            }
            if (Number(fighter1wins) == Number(fighter2wins)) {
              $('#resultBox').html('<br> <h1 class="text-success"> It\'s a tie!');
                new_fighter1_mmr = fighter1_mmr;
                new_fighter2_mmr = fighter2_mmr;
            }
            if (Number(fighter1wins) < Number(fighter2wins)) {
              $('#resultBox').html('<br> <h1 class="text-success"> The Winner is: ' + selectedFighter2 + '!');
                fightResult = "2";
                if (user_betOn == "2") {
                    user_won = "1";
                    finalBetAmount = Number(Number(user_bet) / Number(diff));
                    $('#resultBox').append('Congratulations you won: ' + finalBetAmount.toFixed(0));

                }
                if (user_betOn == "1") {
                    user_won = "0";
                    finalBetAmount = user_bet;
                    $('#resultBox').append('Too bad! you lost: ' + finalBetAmount.toFixed(0));

                }
                if (diff == 0) {

                    new_fighter1_mmr = Number(Number(fighter1_mmr) - Number(25));
                    new_fighter2_mmr = Number(Number(fighter2_mmr) + Number(25));
                } else {
                    new_fighter1_mmr = Number(Number(fighter1_mmr) - Number(25 / diff));
                    new_fighter2_mmr = Number(Number(fighter2_mmr) + Number(25 / diff));

                }
                fightWinner = Number(fighter2ID);
            }

            addBetAndFight(fightResult, fighter1ID, fighter2ID, user_betOn, finalBetAmount, user_won, new_fighter1_mmr, new_fighter2_mmr, fightWinner);
        }
    }
}

function addBetAndFight(fightResult, fighter1ID, fighter2ID, user_betOn, user_bet, user_won, new_fighter1_mmr, new_fighter2_mmr, fightWinner) {
    $.ajax({
        type: "POST",
        url: url + "fights/results",
        dataType: 'json',
        data: {
            fighterResult: fightResult,
            fighter1ID: fighter1ID,
            fighter2ID: fighter2ID,
            user_betOn: user_betOn,
            user_bet: user_bet,
            user_won: user_won,
            new_fighter1_mmr: new_fighter1_mmr,
            new_fighter2_mmr: new_fighter2_mmr,
            fightWinner: fightWinner
        },
        success: function(data) {

        }
    });
}

$('#fightButton').on('click', function() {
    roundWinner = [];
    round = 0;
    fighter1wins = 0;
    fighter2wins = 0;
    user_won = 0;
    $('#resultBox').html("");
    fight();
    //setTimeout(location.reload.bind(location), 8000);

});

//IN PROGRESS
$('#confirmBetButton').on('click', function() {
    if ($('#amountToBet').val() > userCoins || $('#amountToBet').val() < 0) {
        $('#currentBets').html("You don't have enough coins");
    } else {
        fightButton.show();
        $('#currentBets').html(`Betting ${$("#amountToBet").val()} on ${$("#selBetFighter option:selected").text()}`);
        user_bet = Number($("#amountToBet").val()); //Get amount betted
        if ($("#selBetFighter option:selected").text() == selectedFighter1) {
            user_betOn = '1'; //Bets on fighter 1
        } else {
            user_betOn = '2'; //Bets on fighter 2
        }
    }
});
