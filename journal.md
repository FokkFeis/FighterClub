# Journal for FightersClub
## Chapter 1 - The project
### *added 11:10pm 10th of april*
For this project I will be making a website for betting with virtual currency on *fake* fights.
The user will be given a fixed amount for betting for the first time, *amount TBD*. Virtual fights will be added automatically for each session, fighters are added by an admin and are given a standard *fight strength* that increases if the fighter wins and decreases if the fighter loses, A fighters strength or Matchmaking rating(MMR) if you will, is similar to what is found in popular eSport games like CS:GO, DoTA 2, and Overwatch.
These fighters are separated to leagues, *Bronze, Silver, Gold and finally Masters*.

The MMR goes from *1* to *N* meaning there is no MMR cap, and the highest MMR fighter is *Grand Master*
### The league placements are the following
* Bronze (1-999) Minimum bet 1 Maximum 25
* Silver (1000-1999) Minimum bet 25 maximum 50
* Gold (2000-3000) minimum bet 50 maximum 100
* Masters (3000+) minimum bet 100 no maximum
* Grand Master (Highest MMR) ALL IN OR NOTHING | minimum 500

The fight is determined by 3 dice rolls and will factor in the fighters MMR.
##### Example
```json
Fighter_1(
  MMR:2201,
  League: 'Gold' ,
  FightsWon:2
  );

Fighter 2(
  MMR:1989,
  League: 'Silver',
  FightsWon:5
  );
```
As you can see fighter1 has higher MMR and is the favorite.
The MMR difference is *212*
if we divide their MMR
```
2201 / 1989 = 1.10
```
So fighter1 has a *10%* advantage over fighter2

so we multiply his dice roll (6 sided die) by 10% because of his advantage.

let's make a fight.
```
Fighter1 rolls 2
```
```
Fighter2 rolls 3
```
So for the first round figher1 has a total of 2.2

Fighter2 gets a score of 3

Fighter2 wins round 1.

```
Fighter1 rolls 5
```
```
Fighter2 rolls 3
```
So fighter1 gets a score of 5 x 1.1 = *5.5*

Fighter2 gets a score of 3

Fighter1 wins round 2

```
Fighter1 rolls 6
```
```
Fighter2 rolls 3
```
Fighter1 gets a score of 6 x 1.1 = *6.6*

Fighter2 gets a score of 3

Fighter1 wins round 3

Final score is Fighter1 *2* | Fighter2 *1*

So since fighter1 won he gets +25 MMR but since the fight wasn't fair he gets 25 / 1.1 = 22 points

And since fighter2 lost he loses -25 MMR but since he was an underdog he only loses 25 / 1.1 = 22 points

#### End of fight ranking

Fighter1 now has 2224 MMR

Fighter2 now has 1967 MMR

If fighter one would have one he would get a promotion to the Gold league, but since he lost he remains in silver.

Normally FightersClub will try to match fights so that the MMR is similar and hence the fight will be more fair.

### How the user fits in to all of this.

So the user will be able to place a bet on these matches and will get coins in ratio with the fight.

So if *User1* places a 100 coins on fighter1 he will get 90% on the bet or 90 coins because he's betting on a favorite.

If however he bets on fighter2  he will get 110% on the bet or 110 coins because he's betting on a underdog.

### *finished 12:18am 11th of April*


## Chapter 2 - The database and a Partner in Crime
### *10:32am 13th of April*
Stefán Freyr Smárason joins to help with the VEF2A and VEF2B segments.
---
Regarding the database we're going to need a couple of things to make the whole thing work.

| Tables              | Extra info                                                |
| -------------       | :-------------:                                           |
| Users               |                                                           |
| Fighters            | not the same as users                                     |
| bets                | information of the bets each users makes                  |
| user_has_bets       | user_id and bets_id                                       |
| Leagues             | Bronze, Silver, Gold, Master, Grandmaster                 |
| coins               | Keep track of users coins, will need user_id foreign key  |
| fights              | Keep track of fights, we can have a foreign key table     |
| fight_has_fighters  | fight_id and fighter_id                                   |
| fighter_has_leagues | fighter_id and league_id                                  |

So lets make a database and insert some database

### *Finished 10:47am 13th of April*
---
#### More database stuff *2:58pm 13th of April*

So I think we should have a after update trigger to check if a fighter should be moved to a different league after his strength is increased or decreased 
