(function($) {
  "use strict"; // Start of use strict

  $('[data-toggle="popover"]').popover();
  $(".datepicker").datepicker();

  $(document).scroll(function() {
    var y = $(this).scrollTop();
    if (y > 400) {
      $("#trip-nav")
        .stop(true, true)
        .slideDown();
    } else {
      $("#trip-nav")
        .stop(true, true)
        .slideUp();
    }
  });

  // Smooth scrolling using jQuery easing
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (
      location.pathname.replace(/^\//, "") ==
        this.pathname.replace(/^\//, "") &&
      location.hostname == this.hostname
    ) {
      var target = $(this.hash);
      target = target.length ? target : $("[name=" + this.hash.slice(1) + "]");
      if (target.length) {
        $("html, body").animate(
          {
            scrollTop: target.offset().top - 54
          },
          1000,
          "easeInOutExpo"
        );
        return false;
      }
    }
  });

  // Closes responsive menu when a scroll trigger link is clicked
  $(".js-scroll-trigger").click(function() {
    $(".navbar-collapse").collapse("hide");
  });

  // Activate scrollspy to add active class to navbar items on scroll
  $("body").scrollspy({
    target: "#trip-nav",
    offset: 60
  });
  $(window).on("activate.bs.scrollspy", function(e, obj) {
    $(".trip_nav_text").html(
      obj.relatedTarget
        .replace("#", "")
        .replace("_", " ")
        .replace("-", " ")
        .replace(/(?:^|\s)\w/g, function(match) {
          return match.toUpperCase();
        })
    );
  });

  //backtotop
  var _height = 3;
  $("#backtotop").css("bottom", '65px');
  $(window).scroll(function() {
    var topPos = $(this).scrollTop();
    // console.log(topPos);
    if (topPos > 800) {
      $("#backtotop").show();
    } else {
      $("#backtotop").hide();
    }
  });
  $("#backtotop").click(function() {
    $("html, body").animate(
      {
        scrollTop: 0
      },
      800
    );
    return false;
  });

  $(".expand-itinerary-all").on("click", function(e) {
    $("#itineray_accordion .collapse").collapse("show");
    $(this).hide();
    $(".collapse-itinerary-all").show();
  });
  $(".collapse-itinerary-all").on("click", function(e) {
    $("#itineray_accordion .collapse").collapse("hide");
    $(this).hide();
    $(".expand-itinerary-all").show();
  });
})(jQuery); // End of use strict

//AltitudeChart
function AltitudeChart(ctx, data) {
  var myChart = new Chart(ctx, {
    type: "line",
    data: {
      labels: data.labels,
      datasets: [
        {
          label: "Graph of Altitude",
          data: data.datas,
          backgroundColor: "rgba(255, 103, 0, 0.1)",
          borderColor: "rgba(255, 103, 0, 1)",
          borderWidth: 4,
          pointBorderWidth: 0,
          pointWidth: 10,
          pointBorderColor: "rgba(255, 255, 255,1)",
          pointBackgroundColor: "rgba(0, 12, 232,1)"
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: "Graph of Altitude"
      },
      legend: {
        display: false
      },
      scales: {
        xAxes: [
          {
            gridLines: {
              display: true,
              drawBorder: true,
              drawOnChartArea: false
            },
            ticks: {
              autoSkip: false
            }
          }
        ],
        yAxes: [
          {
            gridLines: {
              display: true,
              drawBorder: true,
              drawOnChartArea: false
            },
            ticks: {
              stepSize: 1000
            },
            scaleLabel: {
              display: true,
              labelString: "Heights (in Meter)"
            }
          }
        ]
      },
      plugins: {
        datalabels: {
          color: "rgba(0,0,0, .5)",
          font: {
            weight: "normal",
            size: 11
          },
          offset: 0,
          align: function(data) {
            if (data.dataIndex == 0) {
              return "45";
            } else if (data.dataIndex + 1 == data.dataset.data.length) {
              return "135";
            } else if (data.dataIndex % 2 == 0) {
              return "start";
            } else {
              return "end";
            }
          },
          formatter: function(value) {
            return value + "M";
          }
        }
      },
      tooltips: {
        custom: function(tooltip) {
          if (!tooltip) return;
          tooltip.displayColors = false;
        },
        xAlign: "center",
        yAlign: "bottom",
        _bodyAlign: "center",
        callbacks: {
          label: function(tooltipItem, data) {
            return tooltipItem.yLabel + "M";
          }
        }
      }
    }
  });
}

(function() {
  "use strict";
  window.addEventListener(
    "load",
    function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName("needs-validation");
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener(
          "submit",
          function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add("was-validated");
          },
          false
        );
      });
    },
    false
  );
})();

document.onkeydown = function(e) {
  if (
    e.ctrlKey &&
    (e.keyCode === 67 ||
      e.keyCode === 86 ||
      e.keyCode === 85 ||
      e.keyCode === 117)
  ) {
    return false;
  } else {
    return true;
  }
};

$(document).ready(function() {
  $("body").bind("cut copy paste", function(e) {
    e.preventDefault();
  });
  // $("body").on("contextmenu", function(e) {
  //   return false;
  // });
});
