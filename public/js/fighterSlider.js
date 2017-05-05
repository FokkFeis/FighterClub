//WORK IN PROGRESS, Change from using league names in data-tags and filtering to using league ids

var leagues = {5:"Bronze", 4:"Silver", 3:"Gold", 2:"Masters", 1:"Grandmaster"};
var minLeague;
var maxLeague;

$(function() {
    $("#leagueSlider").slider({
        range: true,
        min: 1,
        max: 5,
        values: [1, 5],
        step: 1,
        slide: function(event, ui) {
            $("#league").val(leagues[ui.values[0]] + " - " + leagues[ui.values[1]]);
            minLeague = ui.values[0];
            maxLeague = ui.values[1];
            filterLeagues(minLeague, maxLeague);
        }
    });
    $("#league").val(leagues[$("#leagueSlider").slider("values", 0)] +
        " - " + leagues[$("#leagueSlider").slider("values", 1)]);
});

function filterLeagues(minLeague, maxPrice) {
    $("#fighterCards div.card").hide().filter(function() {
        var league = $(this).data("tags");
        console.log(league);
        return league >= minLeague && league <= maxLeague;
    }).show();
}
