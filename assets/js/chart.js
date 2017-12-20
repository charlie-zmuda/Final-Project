
            var chart;
            var testing = 1000;
            var chartData = [
  {
    "Rank": 1,
    "Player": "Patrick Kane",
    "Team": "CHI",
    "Position": "R",
    "GamesPlayed": 82,
    "Goals": 46,
    "Assists": 60,
    "Points": 64,
    "HatTricks": 2,
    "Playmaker": 2,
    "GamesWithShots": 81,
    "MultiGoalGames": 5,
    "MultiPointGames": 27,
    "PenaltyMinutes": 13,
    "GamesPositivePlusMinus": 33,
    "GamesEvenPlusMinus": 28,
    "GamesNegativePlusMinus": 21
  },
  {
    "Rank": 2,
    "Player": "Jamie Benn",
    "Team": "DAL",
    "Position": "L",
    "GamesPlayed": 82,
    "Goals": 41,
    "Assists": 48,
    "Points": 56,
    "HatTricks": 0,
    "Playmaker": 2,
    "GamesWithShots": 75,
    "MultiGoalGames": 8,
    "MultiPointGames": 25,
    "PenaltyMinutes": 23,
    "GamesPositivePlusMinus": 36,
    "GamesEvenPlusMinus": 18,
    "GamesNegativePlusMinus": 28
  },
  {
    "Rank": 3,
    "Player": "Sidney Crosby",
    "Team": "PIT",
    "Position": "C",
    "GamesPlayed": 80,
    "Goals": 36,
    "Assists": 49,
    "Points": 53,
    "HatTricks": 1,
    "Playmaker": 1,
    "GamesWithShots": 75,
    "MultiGoalGames": 8,
    "MultiPointGames": 25,
    "PenaltyMinutes": 19,
    "GamesPositivePlusMinus": 37,
    "GamesEvenPlusMinus": 24,
    "GamesNegativePlusMinus": 19
  },
  {
    "Rank": 4,
    "Player": "Brent Burns",
    "Team": "SJS",
    "Position": "D",
    "GamesPlayed": 82,
    "Goals": 27,
    "Assists": 48,
    "Points": 48,
    "HatTricks": 0,
    "Playmaker": 0,
    "GamesWithShots": 81,
    "MultiGoalGames": 3,
    "MultiPointGames": 24,
    "PenaltyMinutes": 19,
    "GamesPositivePlusMinus": 29,
    "GamesEvenPlusMinus": 24,
    "GamesNegativePlusMinus": 29
  },
                {
    "Rank": 4,
    "Player": "Brent Burns",
    "Team": "SJS",
    "Position": "D",
    "GamesPlayed": 82,
    "Goals": 27,
    "Assists": 48,
    "Points": 48,
    "HatTricks": 0,
    "Playmaker": 0,
    "GamesWithShots": 81,
    "MultiGoalGames": 3,
    "MultiPointGames": 24,
    "PenaltyMinutes": 19,
    "GamesPositivePlusMinus": 29,
    "GamesEvenPlusMinus": 24,
    "GamesNegativePlusMinus": 29
  }
                
            ];


            AmCharts.ready(function () {
                // PIE CHART
                chart = new AmCharts.AmPieChart();

                // title of the chart
                chart.addTitle("Goals by Position");

                chart.dataProvider = chartData;
                chart.titleField = "Position";
                chart.valueField = "Goals";
                chart.sequencedAnimation = true;
                chart.startEffect = "elastic";
                chart.innerRadius = "30%";
                chart.startDuration = 2;
                chart.labelRadius = 15;
                chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
                // the following two lines makes the chart 3D
                chart.depth3D = 10;
                chart.angle = 15;

                // WRITE
                chart.write("chartdiv");
            });
