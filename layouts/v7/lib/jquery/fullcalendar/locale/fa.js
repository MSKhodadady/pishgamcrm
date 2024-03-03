! function(e) {
  "function" == typeof define && define.amd ? define(["jquery", "moment"], e) : "object" == typeof exports ? module.exports = e(require("jquery"), require("moment")) : e(jQuery, moment)
}(function(e, t) {
  ! function() {
    var e = {
        1: "1",
        2: "2",
        3: "3",
        4: "4",
        5: "5",
        6: "6",
        7: "7",
        8: "8",
        9: "9",
        0: "0"
      },
      a = {
        "1": "1",
        "2": "2",
        "3": "3",
        "4": "4",
        "5": "5",
        "6": "6",
        "7": "7",
        "8": "8",
        "9": "9",
        "0": "0"
      },
      r = t.defineLocale("fa", {
        months: "ژانویه_فوریه_مارس_آوریل_مه_ژوئن_ژوئیه_اوت_سپتامبر_اکتبر_نوامبر_دسامبر".split("_"),
        monthsShort: "ژانویه_فوریه_مارس_آوریل_مه_ژوئن_ژوئیه_اوت_سپتامبر_اکتبر_نوامبر_دسامبر".split("_"),
        weekdays: "یک‌شنبه_دوشنبه_سه‌شنبه_چهارشنبه_پنج‌شنبه_جمعه_شنبه".split("_"),
        weekdaysShort: "یک‌شنبه_دوشنبه_سه‌شنبه_چهارشنبه_پنج‌شنبه_جمعه_شنبه".split("_"),
        weekdaysMin: "ی_د_س_چ_پ_ج_ش".split("_"),
        weekdaysParseExact: !0,
        longDateFormat: {
          LT: "HH:mm",
          LTS: "HH:mm:ss",
          L: "DD/MM/YYYY",
          LL: "D MMMM YYYY",
          LLL: "D MMMM YYYY HH:mm",
          LLLL: "dddd, D MMMM YYYY HH:mm"
        },
        meridiemParse: /AM|PM/,
        isPM: function(e) {
          return /PM/.test(e)
        },
        meridiem: function(e, t, a) {
          return e < 12 ? " AM" : " PM"
        },
        calendar: {
          sameDay: "[امروز ساعت] LT",
          nextDay: "[فردا ساعت] LT",
          nextWeek: "dddd [ساعت] LT",
          lastDay: "[دیروز ساعت] LT",
          lastWeek: "dddd [پیش] [ساعت] LT",
          sameElse: "L"
        },
        relativeTime: {
          future: "در %s",
          past: "%s پیش",
          s: "چندین ثانیه",
          m: "یک دقیقه",
          mm: "%d دقیقه",
          h: "یک ساعت",
          hh: "%d ساعت",
          d: "یک روز",
          dd: "%d روز",
          M: "یک ماه",
          MM: "%d ماه",
          y: "یک سال",
          yy: "%d سال"
        },
        preparse: function(e) {
          return e.replace(/[۰-۹]/g, function(e) {
            return a[e]
          }).replace(/،/g, ",")
        },
        postformat: function(t) {
          return t.replace(/\d/g, function(t) {
            return e[t]
          }).replace(/,/g, "،")
        },
        ordinalParse: /\d{1,2}م/,
        ordinal: "%dم",
        week: {
          dow: 6,
          doy: 12
        }
      });
    return r
  }(), e.fullCalendar.datepickerLocale("fa", "fa", {
    closeText: "بستن",
    prevText: "&#x3C;قبلی",
    nextText: "بعدی&#x3E;",
    currentText: "امروز",
    monthNames: ["ژانویه", "فوریه", "مارس", "آوریل", "مه", "ژوئن", "ژوئیه", "اوت", "سپتامبر", "اکتبر", "نوامبر", "دسامبر"],
    monthNamesShort: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],
    dayNames: ["يکشنبه", "دوشنبه", "سه‌شنبه", "چهارشنبه", "پنجشنبه", "جمعه", "شنبه"],
    dayNamesShort: ["ی", "د", "س", "چ", "پ", "ج", "ش"],
    dayNamesMin: ["ی", "د", "س", "چ", "پ", "ج", "ش"],
    weekHeader: "هف",
    dateFormat: "yy/mm/dd",
    firstDay: 6,
    isRTL: !0,
    showMonthAfterYear: !1,
    yearSuffix: ""
  }), e.fullCalendar.locale("fa", {
    buttonText: {
      month: "ماه",
      week: "هفته",
      day: "روز",
      list: "برنامه"
    },
    allDayText: "تمام روز",
    eventLimitText: function(e) {
      return "بیش از " + e
    },
    noEventsMessage: "هیچ رویدادی به نمایش"
  })
});
