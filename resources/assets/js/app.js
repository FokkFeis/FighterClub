
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import $ from 'jquery';
window.$ = window.jQuery = $;

import 'jquery-ui/ui/widgets/slider.js';
// frontpage
(function() {
    $("#head").fadeIn("slow");
    $("#para").fadeIn(1000);
    $("#sec2").slideDown(1500);
    $("#sec3").slideDown(1500);
    $("#sec4").fadeIn(1600);
  }());
  
// Fighter league slider
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
        return league >= minLeague && league <= maxLeague;
    }).show();
}