<script src="{{asset('js/script.js')}}"></script>
<script>
  const jan = document.getElementById("jan").value;
  const feb = document.getElementById("feb").value;
  const mar = document.getElementById("mar").value;
  const apr = document.getElementById("apr").value;
  const may = document.getElementById("may").value;
  const jun = document.getElementById("jun").value;
  const jul = document.getElementById("jul").value;
  const aug = document.getElementById("aug").value;
  const sep = document.getElementById("sep").value;
  const oct = document.getElementById("oct").value;
  const nov = document.getElementById("nov").value;
  const dec = document.getElementById("dec").value;

  document.addEventListener("DOMContentLoaded", function () {
    var ctx = document
      .getElementById("chartjs-dashboard-line")
      .getContext("2d");
    var gradient = ctx.createLinearGradient(0, 0, 0, 225);
    gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
    gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
    // Line chart
    new Chart(document.getElementById("chartjs-dashboard-line"), {
      type: "line",
      data: {
        labels: [
          "Jan",
          "Feb",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec",
        ],
        datasets: [
          {
            label: "Rekam Pasien",
            fill: true,
            backgroundColor: gradient,
            borderColor: window.theme.primary,
            data: [
              jan, feb, mar, apr, may, jun, jul, aug, sep, oct,
              nov, dec,
            ],
          },
        ],
      },
      options: {
        maintainAspectRatio: false,
        legend: {
          display: false,
        },
        tooltips: {
          intersect: false,
        },
        hover: {
          intersect: true,
        },
        plugins: {
          filler: {
            propagate: false,
          },
        },
        scales: {
          xAxes: [
            {
              reverse: true,
              gridLines: {
                color: "rgba(0,0,0,0.0)",
              },
            },
          ],
          yAxes: [
            {
              ticks: {
                stepSize: 1000,
              },
              display: true,
              borderDash: [3, 3],
              gridLines: {
                color: "rgba(0,0,0,0.0)",
              },
            },
          ],
        },
      },
    });
  });
</script>
<script>
  const rawatinap = document.getElementById("rawatinap").value;
  const rawatjalan = document.getElementById("rawatjalan").value;
  document.addEventListener("DOMContentLoaded", function () {
    // Pie chart
    new Chart(document.getElementById("chartjs-dashboard-pie"), {
      type: "pie",
      data: {
        labels: ["Rawat Inap", "Rawat Jalan"],
        datasets: [
          {
            data: [rawatinap, rawatjalan],
            backgroundColor: [
              window.theme.primary,
              window.theme.warning,
            ],
            borderWidth: 5,
          },
        ],
      },
      options: {
        responsive: !window.MSInputMethodContext,
        maintainAspectRatio: false,
        legend: {
          display: false,
        },
        cutoutPercentage: 75,
      },
    });
  });
</script>