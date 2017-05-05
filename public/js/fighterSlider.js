//WORK IN PROGRESS, Change from using league names in data-tags and filtering to using league ids

var leagues = ["Bronze", "Silver", "Gold", "Masters", "Grandmaster"];
var minLeague;
var maxLeague;

$(function() {
    $("#leagueSlider").slider({
        range: true,
        min: 0,
        max: 4,
        values: [0, 4],
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
        return price >= minLeague && price <= maxLeague;
    }).show();
}
