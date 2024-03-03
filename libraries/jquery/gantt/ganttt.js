function gant_format(f) {
    switch (f) {
    case "yyyy-mm-dd":
        return "jYYYY-jMM-jDD";
    case "mm-dd-yyyy":
        return "jMM-jDD-jYYYY";
    case "dd-mm-yyyy":
        return "jDD-jMM-jYYYY";
    case "yyyy/mm/dd":
        return "jYYYY/jMM/jDD";
    case "mm/dd/yyyy":
        return "jMM/jDD/jYYYY";
    case "dd/mm/yyyy":
        return "jDD/jMM/jYYYY";
    case "yyyy.mm.dd":
        return "jYYYY.jMM.jDD";
    case "mm.dd.yyyy":
        return "jMM.jDD.jYYYY";
    case "dd.mm.yyyy":
        return "jDD.jMM.jYYYY"
    }
}! function () {
    function require(name) {
        var module = require.modules[name];
        if (!module) throw new Error('failed to require "' + name + '"');
        if (!('exports' in module) && typeof module.definition === 'function') {
          module.client = module.component = true;
          module.definition.call(this, module.exports = {}, module);
          delete module.definition;
        }
        return module.exports;
      }
      require.modules = {
        moment: {
          exports: moment
        }
      };
      require.register = function(name, definition) {
        require.modules[name] = {
          definition: definition
        };
      };
      require.define = function(name, exports) {
        require.modules[name] = {
          exports: exports
        };
      };
      require.register("jalaali-js", function(exports, module) {
        module.exports = {
          toJalaali: toJalaali,
          toGregorian: toGregorian,
          isValidJalaaliDate: isValidJalaaliDate,
          isLeapJalaaliYear: isLeapJalaaliYear,
          jalaaliMonthLength: jalaaliMonthLength,
          jalCal: jalCal,
          j2d: j2d,
          d2j: d2j,
          g2d: g2d,
          d2g: d2g
        }
    
        function toJalaali(gy, gm, gd) {
          return d2j(g2d(gy, gm, gd))
        }
    
        function toGregorian(jy, jm, jd) {
          return d2g(j2d(jy, jm, jd))
        }
    
        function isValidJalaaliDate(jy, jm, jd) {
          return jy >= -61 && jy <= 3177 && jm >= 1 && jm <= 12 && jd >= 1 && jd <= jalaaliMonthLength(jy, jm)
        }
    
        function isLeapJalaaliYear(jy) {
          return jalCal(jy).leap === 0
        }
    
        function jalaaliMonthLength(jy, jm) {
          if (jm <= 6) return 31
          if (jm <= 11) return 30
          if (isLeapJalaaliYear(jy)) return 30
          return 29
        }
    
        function jalCal(jy) {
          var breaks = [-61, 9, 38, 199, 426, 686, 756, 818, 1111, 1181, 1210, 1635, 2060, 2097, 2192, 2262, 2324, 2394, 2456, 3178],
            bl = breaks.length,
            gy = jy + 621,
            leapJ = -14,
            jp = breaks[0],
            jm, jump, leap, leapG, march, n, i
          if (jy < jp || jy >= breaks[bl - 1])
            throw new Error('Invalid Jalaali year ' + jy)
          for (i = 1; i < bl; i += 1) {
            jm = breaks[i]
            jump = jm - jp
            if (jy < jm)
              break
            leapJ = leapJ + div(jump, 33) * 8 + div(mod(jump, 33), 4)
            jp = jm
          }
          n = jy - jp
          leapJ = leapJ + div(n, 33) * 8 + div(mod(n, 33) + 3, 4)
          if (mod(jump, 33) === 4 && jump - n === 4)
            leapJ += 1
          leapG = div(gy, 4) - div((div(gy, 100) + 1) * 3, 4) - 150
          march = 20 + leapJ - leapG
          if (jump - n < 6)
            n = n - jump + div(jump + 4, 33) * 33
          leap = mod(mod(n + 1, 33) - 1, 4)
          if (leap === -1) {
            leap = 4
          }
          return {
            leap: leap,
            gy: gy,
            march: march
          }
        }
    
        function j2d(jy, jm, jd) {
          var r = jalCal(jy)
          return g2d(r.gy, 3, r.march) + (jm - 1) * 31 - div(jm, 7) * (jm - 7) + jd - 1
        }
    
        function d2j(jdn) {
          var gy = d2g(jdn).gy,
            jy = gy - 621,
            r = jalCal(jy),
            jdn1f = g2d(gy, 3, r.march),
            jd, jm, k
          k = jdn - jdn1f
          if (k >= 0) {
            if (k <= 185) {
              jm = 1 + div(k, 31)
              jd = mod(k, 31) + 1
              return {
                jy: jy,
                jm: jm,
                jd: jd
              }
            } else {
              k -= 186
            }
          } else {
            jy -= 1
            k += 179
            if (r.leap === 1)
              k += 1
          }
          jm = 7 + div(k, 30)
          jd = mod(k, 30) + 1
          return {
            jy: jy,
            jm: jm,
            jd: jd
          }
        }
    
        function g2d(gy, gm, gd) {
          var d = div((gy + div(gm - 8, 6) + 100100) * 1461, 4) +
            div(153 * mod(gm + 9, 12) + 2, 5) +
            gd - 34840408
          d = d - div(div(gy + 100100 + div(gm - 8, 6), 100) * 3, 4) + 752
          return d
        }
    
        function d2g(jdn) {
          var j, i, gd, gm, gy
          j = 4 * jdn + 139361631
          j = j + div(div(4 * jdn + 183187720, 146097) * 3, 4) * 4 - 3908
          i = div(mod(j, 1461), 4) * 5 + 308
          gd = div(mod(i, 153), 5) + 1
          gm = mod(div(i, 153), 12) + 1
          gy = div(j, 1461) - 100100 + div(8 - gm, 6)
          return {
            gy: gy,
            gm: gm,
            gd: gd
          }
        }
    
        function div(a, b) {
          return ~~(a / b)
        }
    
        function mod(a, b) {
          return a - ~~(a / b) * b
        }
      })
      require.register("moment-jalaali", function(exports, module) {
        module.exports = jMoment
        var moment = require('moment'),
          jalaali = require('jalaali-js')
        var formattingTokens = /(\[[^\[]*\])|(\\)?j(Mo|MM?M?M?|Do|DDDo|DD?D?D?|w[o|w]?|YYYYY|YYYY|YY|gg(ggg?)?|)|(\\)?(Mo|MM?M?M?|Do|DDDo|DD?D?D?|ddd?d?|do?|w[o|w]?|W[o|W]?|YYYYY|YYYY|YY|gg(ggg?)?|GG(GGG?)?|e|E|a|A|hh?|HH?|mm?|ss?|SS?S?|X|zz?|ZZ?|.)/g,
          localFormattingTokens = /(\[[^\[]*\])|(\\)?(LT|LL?L?L?|l{1,4})/g,
          parseTokenOneOrTwoDigits = /\d\d?/,
          parseTokenOneToThreeDigits = /\d{1,3}/,
          parseTokenThreeDigits = /\d{3}/,
          parseTokenFourDigits = /\d{1,4}/,
          parseTokenSixDigits = /[+\-]?\d{1,6}/,
          parseTokenWord = /[0-9]*['a-z\u00A0-\u05FF\u0700-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+|[\u0600-\u06FF\/]+(\s*?[\u0600-\u06FF]+){1,2}/i,
          parseTokenTimezone = /Z|[\+\-]\d\d:?\d\d/i,
          parseTokenT = /T/i,
          parseTokenTimestampMs = /[\+\-]?\d+(\.\d{1,3})?/,
          unitAliases = {
            jm: 'jmonth',
            jmonths: 'jmonth',
            jy: 'jyear',
            jyears: 'jyear'
          },
          formatFunctions = {},
          ordinalizeTokens = 'DDD w M D'.split(' '),
          paddedTokens = 'M D w'.split(' '),
          formatTokenFunctions = {
            jM: function() {
              return this.jMonth() + 1
            },
            jMMM: function(format) {
              return this.localeData().jMonthsShort(this, format)
            },
            jMMMM: function(format) {
              return this.localeData().jMonths(this, format)
            },
            jD: function() {
              return this.jDate()
            },
            jDDD: function() {
              return this.jDayOfYear()
            },
            jw: function() {
              return this.jWeek()
            },
            jYY: function() {
              return leftZeroFill(this.jYear() % 100, 2)
            },
            jYYYY: function() {
              return leftZeroFill(this.jYear(), 4)
            },
            jYYYYY: function() {
              return leftZeroFill(this.jYear(), 5)
            },
            jgg: function() {
              return leftZeroFill(this.jWeekYear() % 100, 2)
            },
            jgggg: function() {
              return this.jWeekYear()
            },
            jggggg: function() {
              return leftZeroFill(this.jWeekYear(), 5)
            }
          }
    
        function padToken(func, count) {
          return function(a) {
            return leftZeroFill(func.call(this, a), count)
          }
        }
    
        function ordinalizeToken(func, period) {
          return function(a) {
            return this.localeData().ordinal(func.call(this, a), period)
          }
        }
        (function() {
          var i
          while (ordinalizeTokens.length) {
            i = ordinalizeTokens.pop()
            formatTokenFunctions['j' + i + 'o'] = ordinalizeToken(formatTokenFunctions['j' + i], i)
          }
          while (paddedTokens.length) {
            i = paddedTokens.pop()
            formatTokenFunctions['j' + i + i] = padToken(formatTokenFunctions['j' + i], 2)
          }
          formatTokenFunctions.jDDDD = padToken(formatTokenFunctions.jDDD, 3)
        }())
    
        function extend(a, b) {
          var key
          for (key in b)
            if (b.hasOwnProperty(key))
              a[key] = b[key]
          return a
        }
    
        function leftZeroFill(number, targetLength) {
          var output = number + ''
          while (output.length < targetLength)
            output = '0' + output
          return output
        }
    
        function isArray(input) {
          return Object.prototype.toString.call(input) === '[object Array]'
        }
    
        function normalizeUnits(units) {
          if (units) {
            var lowered = units.toLowerCase()
            units = unitAliases[lowered] || lowered
          }
          return units
        }
    
        function setDate(m, year, month, date) {
          var d = m._d
          if (m._isUTC) {
            m._d = new Date(Date.UTC(year, month, date, d.getUTCHours(), d.getUTCMinutes(), d.getUTCSeconds(), d.getUTCMilliseconds()))
          } else {
            m._d = new Date(year, month, date, d.getHours(), d.getMinutes(), d.getSeconds(), d.getMilliseconds())
          }
        }
    
        function objectCreate(parent) {
          function F() {}
          F.prototype = parent
          return new F()
        }
    
        function getPrototypeOf(object) {
          if (Object.getPrototypeOf)
            return Object.getPrototypeOf(object)
          else if (''.__proto__)
            return object.__proto__
          else
            return object.constructor.prototype
        }
        extend(getPrototypeOf(moment.localeData()), {
          _jMonths: [ 'فروردین'
                            , 'اردیبهشت'
                            , 'خرداد'
                            , 'تیر'
                            , 'مرداد'
                            , 'شهریور'
                            , 'مهر'
                            , 'آبان'
                            , 'آذر'
                            , 'دی'
                            , 'بهمن'
                            , 'اسفند'
                      ],
          jMonths: function(m) {
            return this._jMonths[m.jMonth()]
          },
          _jMonthsShort:  [ 'فروردین'
                            , 'اردیبهشت'
                            , 'خرداد'
                            , 'تیر'
                            , 'مرداد'
                            , 'شهریور'
                            , 'مهر'
                            , 'آبان'
                            , 'آذر'
                            , 'دی'
                            , 'بهمن'
                            , 'اسفند'
                            ],
          jMonthsShort: function(m) {
            return this._jMonthsShort[m.jMonth()]
          },
          jMonthsParse: function(monthName) {
            var i, mom, regex
            if (!this._jMonthsParse)
              this._jMonthsParse = []
            for (i = 0; i < 12; i += 1) {
              if (!this._jMonthsParse[i]) {
                mom = jMoment([2000, (2 + i) % 12, 25])
                regex = '^' + this.jMonths(mom, '') + '|^' + this.jMonthsShort(mom, '')
                this._jMonthsParse[i] = new RegExp(regex.replace('.', ''), 'i')
              }
              if (this._jMonthsParse[i].test(monthName))
                return i
            }
          }
        })
    
        function makeFormatFunction(format) {
          var array = format.match(formattingTokens),
            length = array.length,
            i
          for (i = 0; i < length; i += 1)
            if (formatTokenFunctions[array[i]])
              array[i] = formatTokenFunctions[array[i]]
          return function(mom) {
            var output = ''
            for (i = 0; i < length; i += 1)
              output += array[i] instanceof Function ? '[' + array[i].call(mom, format) + ']' : array[i]
            return output
          }
        }
    
        function getParseRegexForToken(token, config) {
          switch (token) {
            case 'jDDDD':
              return parseTokenThreeDigits
            case 'jYYYY':
              return parseTokenFourDigits
            case 'jYYYYY':
              return parseTokenSixDigits
            case 'jDDD':
              return parseTokenOneToThreeDigits
            case 'jMMM':
            case 'jMMMM':
              return parseTokenWord
            case 'jMM':
            case 'jDD':
            case 'jYY':
            case 'jM':
            case 'jD':
              return parseTokenOneOrTwoDigits
            case 'DDDD':
              return parseTokenThreeDigits
            case 'YYYY':
              return parseTokenFourDigits
            case 'YYYYY':
              return parseTokenSixDigits
            case 'S':
            case 'SS':
            case 'SSS':
            case 'DDD':
              return parseTokenOneToThreeDigits
            case 'MMM':
            case 'MMMM':
            case 'dd':
            case 'ddd':
            case 'dddd':
              return parseTokenWord
            case 'a':
            case 'A':
              return moment.localeData(config._l)._meridiemParse
            case 'X':
              return parseTokenTimestampMs
            case 'Z':
            case 'ZZ':
              return parseTokenTimezone
            case 'T':
              return parseTokenT
            case 'MM':
            case 'DD':
            case 'YY':
            case 'HH':
            case 'hh':
            case 'mm':
            case 'ss':
            case 'M':
            case 'D':
            case 'd':
            case 'H':
            case 'h':
            case 'm':
            case 's':
              return parseTokenOneOrTwoDigits
            default:
              return new RegExp(token.replace('\\', ''))
          }
        }
    
        function addTimeToArrayFromToken(token, input, config) {
          var a, datePartArray = config._a
          switch (token) {
            case 'jM':
            case 'jMM':
              datePartArray[1] = input == null ? 0 : ~~input - 1
              break
            case 'jMMM':
            case 'jMMMM':
              a = moment.localeData(config._l).jMonthsParse(input)
              if (a != null)
                datePartArray[1] = a
              else
                config._isValid = false
              break
            case 'jD':
            case 'jDD':
            case 'jDDD':
            case 'jDDDD':
              if (input != null)
                datePartArray[2] = ~~input
              break
            case 'jYY':
              datePartArray[0] = ~~input + (~~input > 47 ? 1300 : 1400)
              break
            case 'jYYYY':
            case 'jYYYYY':
              datePartArray[0] = ~~input
          }
          if (input == null)
            config._isValid = false
        }
    
        function dateFromArray(config) {
          var g, j, jy = config._a[0],
            jm = config._a[1],
            jd = config._a[2]
          if ((jy == null) && (jm == null) && (jd == null))
            return [0, 0, 1]
          jy = jy != null ? jy : 0
          jm = jm != null ? jm : 0
          jd = jd != null ? jd : 1
          if (jd < 1 || jd > jMoment.jDaysInMonth(jy, jm) || jm < 0 || jm > 11)
            config._isValid = false
          g = toGregorian(jy, jm, jd)
          j = toJalaali(g.gy, g.gm, g.gd)
          config._jDiff = 0
          if (~~j.jy !== jy)
            config._jDiff += 1
          if (~~j.jm !== jm)
            config._jDiff += 1
          if (~~j.jd !== jd)
            config._jDiff += 1
          return [g.gy, g.gm, g.gd]
        }
    
        function makeDateFromStringAndFormat(config) {
          var tokens = config._f.match(formattingTokens),
            string = config._i + '',
            len = tokens.length,
            i, token, parsedInput
          config._a = []
          for (i = 0; i < len; i += 1) {
            token = tokens[i]
            parsedInput = (getParseRegexForToken(token, config).exec(string) || [])[0]
            if (parsedInput)
              string = string.slice(string.indexOf(parsedInput) + parsedInput.length)
            if (formatTokenFunctions[token])
              addTimeToArrayFromToken(token, parsedInput, config)
          }
          if (string)
            config._il = string
          return dateFromArray(config)
        }
    
        function makeDateFromStringAndArray(config, utc) {
          var len = config._f.length,
            i, format, tempMoment, bestMoment, currentScore, scoreToBeat
          if (len === 0) {
            return makeMoment(new Date(NaN))
          }
          for (i = 0; i < len; i += 1) {
            format = config._f[i]
            currentScore = 0
            tempMoment = makeMoment(config._i, format, config._l, config._strict, utc)
            if (!tempMoment.isValid()) continue
            currentScore += tempMoment._jDiff
            if (tempMoment._il)
              currentScore += tempMoment._il.length
            if (scoreToBeat == null || currentScore < scoreToBeat) {
              scoreToBeat = currentScore
              bestMoment = tempMoment
            }
          }
          return bestMoment
        }
    
        function removeParsedTokens(config) {
          var string = config._i + '',
            input = '',
            format = '',
            array = config._f.match(formattingTokens),
            len = array.length,
            i, match, parsed
          for (i = 0; i < len; i += 1) {
            match = array[i]
            parsed = (getParseRegexForToken(match, config).exec(string) || [])[0]
            if (parsed)
              string = string.slice(string.indexOf(parsed) + parsed.length)
            if (!(formatTokenFunctions[match] instanceof Function)) {
              format += match
              if (parsed)
                input += parsed
            }
          }
          config._i = input
          config._f = format
        }
    
        function jWeekOfYear(mom, firstDayOfWeek, firstDayOfWeekOfYear) {
          var end = firstDayOfWeekOfYear - firstDayOfWeek,
            daysToDayOfWeek = firstDayOfWeekOfYear - mom.day(),
            adjustedMoment
          if (daysToDayOfWeek > end) {
            daysToDayOfWeek -= 7
          }
          if (daysToDayOfWeek < end - 7) {
            daysToDayOfWeek += 7
          }
          adjustedMoment = jMoment(mom).add(daysToDayOfWeek, 'd')
          return {
            week: Math.ceil(adjustedMoment.jDayOfYear() / 7),
            year: adjustedMoment.jYear()
          }
        }
    
        function makeMoment(input, format, lang, strict, utc) {
          if (typeof lang === 'boolean') {
            utc = strict
            strict = lang
            lang = undefined
          }
          var config = {
              _i: input,
              _f: format,
              _l: lang,
              _strict: strict,
              _isUTC: utc
            },
            date, m, jm, origInput = input,
            origFormat = format
          if (format) {
            if (isArray(format)) {
              return makeDateFromStringAndArray(config, utc)
            } else {
              date = makeDateFromStringAndFormat(config)
              removeParsedTokens(config)
              format = 'YYYY-MM-DD-' + config._f
              input = leftZeroFill(date[0], 4) + '-' +
                leftZeroFill(date[1] + 1, 2) + '-' +
                leftZeroFill(date[2], 2) + '-' +
                config._i
            }
          }
          if (utc)
            m = moment.utc(input, format, lang, strict)
          else
            m = moment(input, format, lang, strict)
          if (config._isValid === false)
            m._isValid = false
          m._jDiff = config._jDiff || 0
          jm = objectCreate(jMoment.fn)
          extend(jm, m)
          if (strict && jm.isValid()) {
            jm._isValid = jm.format(origFormat) === origInput
          }
          return jm
        }
    
        function jMoment(input, format, lang, strict) {
          return makeMoment(input, format, lang, strict, false)
        }
        extend(jMoment, moment)
        jMoment.fn = objectCreate(moment.fn)
        jMoment.utc = function(input, format, lang, strict) {
          return makeMoment(input, format, lang, strict, true)
        }
        jMoment.unix = function(input) {
          return makeMoment(input * 1000)
        }
        jMoment.fn.format = function(format) {
          var i, replace, me = this
          if (format) {
            i = 5
            replace = function(input) {
              return me.localeData().longDateFormat(input) || input
            }
            while (i > 0 && localFormattingTokens.test(format)) {
              i -= 1
              format = format.replace(localFormattingTokens, replace)
            }
            if (!formatFunctions[format]) {
              formatFunctions[format] = makeFormatFunction(format)
            }
            format = formatFunctions[format](this)
          }
          return moment.fn.format.call(this, format)
        }
        jMoment.fn.jYear = function(input) {
          var lastDay, j, g
          if (typeof input === 'number') {
            j = toJalaali(this.year(), this.month(), this.date())
            lastDay = Math.min(j.jd, jMoment.jDaysInMonth(input, j.jm))
            g = toGregorian(input, j.jm, lastDay)
            setDate(this, g.gy, g.gm, g.gd)
            moment.updateOffset(this)
            return this
          } else {
            return toJalaali(this.year(), this.month(), this.date()).jy
          }
        }
        jMoment.fn.jMonth = function(input) {
          var lastDay, j, g
          if (input != null) {
            if (typeof input === 'string') {
              input = this.lang().jMonthsParse(input)
              if (typeof input !== 'number')
                return this
            }
            j = toJalaali(this.year(), this.month(), this.date())
            lastDay = Math.min(j.jd, jMoment.jDaysInMonth(j.jy, input))
            this.jYear(j.jy + div(input, 12))
            input = mod(input, 12)
            if (input < 0) {
              input += 12
              this.jYear(this.jYear() - 1)
            }
            g = toGregorian(this.jYear(), input, lastDay)
            setDate(this, g.gy, g.gm, g.gd)
            moment.updateOffset(this)
            return this
          } else {
            return toJalaali(this.year(), this.month(), this.date()).jm
          }
        }
        jMoment.fn.jDate = function(input) {
          var j, g
          if (typeof input === 'number') {
            j = toJalaali(this.year(), this.month(), this.date())
            g = toGregorian(j.jy, j.jm, input)
            setDate(this, g.gy, g.gm, g.gd)
            moment.updateOffset(this)
            return this
          } else {
            return toJalaali(this.year(), this.month(), this.date()).jd
          }
        }
        jMoment.fn.jDayOfYear = function(input) {
          var dayOfYear = Math.round((jMoment(this).startOf('day') - jMoment(this).startOf('jYear')) / 864e5) + 1
          return input == null ? dayOfYear : this.add(input - dayOfYear, 'd')
        }
        jMoment.fn.jWeek = function(input) {
          var week = jWeekOfYear(this, this.localeData()._week.dow, this.localeData()._week.doy).week
          return input == null ? week : this.add((input - week) * 7, 'd')
        }
        jMoment.fn.jWeekYear = function(input) {
          var year = jWeekOfYear(this, this.localeData()._week.dow, this.localeData()._week.doy).year
          return input == null ? year : this.add(input - year, 'y')
        }
        jMoment.fn.add = function(val, units) {
          var temp
          if (units !== null && !isNaN(+units)) {
            temp = val
            val = units
            units = temp
          }
          units = normalizeUnits(units)
          if (units === 'jyear') {
            this.jYear(this.jYear() + val)
          } else if (units === 'jmonth') {
            this.jMonth(this.jMonth() + val)
          } else {
            moment.fn.add.call(this, val, units)
          }
          return this
        }
        jMoment.fn.subtract = function(val, units) {
          var temp
          if (units !== null && !isNaN(+units)) {
            temp = val
            val = units
            units = temp
          }
          units = normalizeUnits(units)
          if (units === 'jyear') {
            this.jYear(this.jYear() - val)
          } else if (units === 'jmonth') {
            this.jMonth(this.jMonth() - val)
          } else {
            moment.fn.subtract.call(this, val, units)
          }
          return this
        }
        jMoment.fn.startOf = function(units) {
          units = normalizeUnits(units)
          if (units === 'jyear' || units === 'jmonth') {
            if (units === 'jyear') {
              this.jMonth(0)
            }
            this.jDate(1)
            this.hours(0)
            this.minutes(0)
            this.seconds(0)
            this.milliseconds(0)
            return this
          } else {
            return moment.fn.startOf.call(this, units)
          }
        }
        jMoment.fn.endOf = function(units) {
          units = normalizeUnits(units)
          if (units === undefined || units === 'milisecond') {
            return this
          }
          return this.startOf(units).add(1, (units === 'isoweek' ? 'week' : units)).subtract(1, 'ms')
        }
        jMoment.fn.isSame = function(other, units) {
          units = normalizeUnits(units)
          if (units === 'jyear' || units === 'jmonth') {
            return moment.fn.isSame.call(this.startOf(units), other.startOf(units))
          }
          return moment.fn.isSame.call(this, other, units)
        }
        jMoment.fn.clone = function() {
          return jMoment(this)
        }
        jMoment.fn.jYears = jMoment.fn.jYear
        jMoment.fn.jMonths = jMoment.fn.jMonth
        jMoment.fn.jDates = jMoment.fn.jDate
        jMoment.fn.jWeeks = jMoment.fn.jWeek
        jMoment.jDaysInMonth = function(year, month) {
          year += div(month, 12)
          month = mod(month, 12)
          if (month < 0) {
            month += 12
            year -= 1
          }
          if (month < 6) {
            return 31
          } else if (month < 11) {
            return 30
          } else if (jMoment.jIsLeapYear(year)) {
            return 30
          } else {
            return 29
          }
        }
        jMoment.jIsLeapYear = jalaali.isLeapJalaaliYear
        jMoment.loadPersian = function() {
          moment.defineLocale('fa', {
            months: ('ژانویه_فوریه_مارس_آوریل_مه_ژوئن_ژوئیه_اوت_سپتامبر_اکتبر_نوامبر_دسامبر').split('_')
              , monthsShort: ('ژانویه_فوریه_مارس_آوریل_مه_ژوئن_ژوئیه_اوت_سپتامبر_اکتبر_نوامبر_دسامبر').split('_')
              , weekdays: ('یک\u200cشنبه_دوشنبه_سه\u200cشنبه_چهارشنبه_پنج\u200cشنبه_آدینه_شنبه').split('_')
              , weekdaysShort: ('یک\u200cشنبه_دوشنبه_سه\u200cشنبه_چهارشنبه_پنج\u200cشنبه_آدینه_شنبه').split('_')
              , weekdaysMin: 'ی_د_س_چ_پ_آ_ش'.split('_')
              , longDateFormat:
                { LT: 'HH:mm'
                , L: 'jYYYY/jMM/jDD'
                , LL: 'jD jMMMM jYYYY'
                , LLL: 'jD jMMMM jYYYY LT'
                , LLLL: 'dddd، jD jMMMM jYYYY LT'
                }
              , calendar:
                { sameDay: '[امروز ساعت] LT'
                , nextDay: '[فردا ساعت] LT'
                , nextWeek: 'dddd [ساعت] LT'
                , lastDay: '[دیروز ساعت] LT'
                , lastWeek: 'dddd [ی پیش ساعت] LT'
                , sameElse: 'L'
                }
              , relativeTime:
                { future: 'در %s'
                , past: '%s پیش'
                , s: 'چند ثانیه'
                , m: '1 دقیقه'
                , mm: '%d دقیقه'
                , h: '1 ساعت'
                , hh: '%d ساعت'
                , d: '1 روز'
                , dd: '%d روز'
                , M: '1 ماه'
                , MM: '%d ماه'
                , y: '1 سال'
                , yy: '%d سال'
                }
              , ordinal: '%dم',
            week: {
              dow: 6,
              doy: 12
            },
            meridiem: function (hour) {
                return hour < 12 ? 'ق.ظ' : 'ب.ظ'
              }
            , jMonths: ('فروردین_اردیبهشت_خرداد_تیر_مرداد_شهریور_مهر_آبان_آذر_دی_بهمن_اسفند').split('_')
            , jMonthsShort: 'فرو_ارد_خرد_تیر_امر_شهر_مهر_آبا_آذر_دی_بهم_اسف'.split('_')
          })
        }
        jMoment.jConvert = {
          toJalaali: toJalaali,
          toGregorian: toGregorian
        }
    
        function toJalaali(gy, gm, gd) {
          var j = jalaali.toJalaali(gy, gm + 1, gd)
          j.jm -= 1
          return j
        }
    
        function toGregorian(jy, jm, jd) {
          var g = jalaali.toGregorian(jy, jm + 1, jd)
          g.gm -= 1
          return g
        }
    
        function div(a, b) {
          return ~~(a / b)
        }
    
        function mod(a, b) {
          return a - ~~(a / b) * b
        }
      });
      if (typeof exports == "object") {
        module.exports = require("moment-jalaali");
      } else if (typeof define == "function" && define.amd) {
        define([], function() {
          return require("moment-jalaali");
        });
      } else {
        this["moment"] = require("moment-jalaali");
      }
}();
(GridEditor.prototype.refreshTaskRow = function (task) {
    var row = task.rowElement;
    task.oldstart = row.find("\[name=start\]").text(), task.oldend = row.find("\[name=end\]").text(), row.find(".taskRowIndex").html(task.getRow() + 1), row.find(".indentCell").css("padding-left", 16 * task.level + 12), row.find("\[name=name\]").val(task.name), row.find("\[status\]").attr("status", task.status);
    var diff = task.end - task.start,
        duration = Math.floor(diff / 864e5 + 1);
    0 == duration ? duration += 1 : duration < 0 && (duration = 0), diff < 0 && (task.end = computeEndByDuration(task.start, duration)), row.find("\[name=duration\]").val(task.duration);
    var dateFormat = gant_format(jQuery("#userDateFormat").val()),
        startDate = moment(new Date(task.start)).format(dateFormat),
        endDate = moment(new Date(task.end)).format(dateFormat);
    row.find("\[name=start\]").text(startDate).updateOldValue(), row.find("\[name=end\]").text(endDate).updateOldValue(), row.find("\[name=durationtext\]").text(duration).updateOldValue(), row.find("\[name=depends\]").val(task.depends), row.find(".taskAssigs").html(task.getAssigsString()), this.master.element.trigger("updateTaskRecord.gantt", task)
}, 
Ganttalendar.prototype.create = function (zoom, originalStartmillis, originalEndMillis) {
    var self = this;
    function getPeriod(zoomLevel, stMil, endMillis) {
      var start = new Date(stMil);
      var end = new Date(endMillis);

      //reset hours
      if (zoomLevel == "d") {
        start.setHours(0, 0, 0, 0);
        end.setHours(23, 59, 59, 999);
  
        start.setFirstDayOfThisWeek();
        end.setFirstDayOfThisWeek();
        end.setDate(end.getDate() + 6);
  
  
        //reset day of week
      } else if (zoomLevel == "w") {
        start.setHours(0, 0, 0, 0);
        end.setHours(23, 59, 59, 999);
  
        start.setFirstDayOfThisWeek();
        end.setFirstDayOfThisWeek();
        end.setDate(end.getDate() + 6);
  
        //reset day of month
      } else if (zoomLevel == "m") {
        var startMoment = new moment(start); 
        startMoment.jDates(1);
        var endMoment = new moment(end); 
        endMoment.jMonth(endMoment.jMonth() + 1);
        endMoment.jDates(1); 
        endMoment.jDates(endMoment.jDates() - 1); 
        start = startMoment.toDate();
        end = endMoment.toDate();
        start.setHours(0, 0, 0, 0);
        end.setHours(23, 59, 59, 999);
      } else if (zoomLevel == "q") {
        start.setHours(0, 0, 0, 0);
        end.setHours(23, 59, 59, 999);
        start.setDate(1);
        start.setMonth(Math.floor(start.getMonth() / 3) * 3);
        end.setDate(1);
        end.setMonth(Math.floor(end.getMonth() / 3) * 3 + 3);
        end.setDate(end.getDate() - 1);
  
        //reset to semester
      } else if (zoomLevel == "s") {
        start.setHours(0, 0, 0, 0);
        end.setHours(23, 59, 59, 999);
        start.setDate(1);
  
        start.setMonth(Math.floor(start.getMonth() / 6) * 6);
        end.setDate(1);
        end.setMonth(Math.floor(end.getMonth() / 6) * 6 + 6);
        end.setDate(end.getDate() - 1);
  
        //reset to year - > gen
      } else if (zoomLevel == "y") {
        start.setHours(0, 0, 0, 0);
        end.setHours(23, 59, 59, 999);
  
        start.setDate(1);
        start.setMonth(0);
  
        end.setDate(1);
        end.setMonth(12);
        end.setDate(end.getDate() - 1);
      }

      return {start:start.getTime(), end:end.getTime()};
    }
  
    function createHeadCell(lbl, span, additionalClass, width) {
      var th = $("<th>").html(lbl).attr("colSpan", span);
      if (width)
        th.width(width);
      if (additionalClass)
        th.addClass(additionalClass);
      return th;
    }
  
    function createBodyCell(span, isEnd, additionalClass) {
      var ret = $("<td>").html("").attr("colSpan", span).addClass("ganttBodyCell");
      if (isEnd)
        ret.addClass("end");
      if (additionalClass)
        ret.addClass(additionalClass);
      return ret;
    }
  
    function createGantt(zoom, startPeriod, endPeriod) {
      var tr1 = $("<tr>").addClass("ganttHead1");
      var tr2 = $("<tr>").addClass("ganttHead2");
      var trBody = $("<tr>").addClass("ganttBody");


      function iterate(renderFunction1, renderFunction2) {
        var start = new Date(startPeriod);
        //loop for header1
        while (start.getTime() <= endPeriod) {
          renderFunction1(start);
        }
  
        //loop for header2
        start = new Date(startPeriod);
        while (start.getTime() <= endPeriod) {
          renderFunction2(start);
        }
      }
  
      //this is computed by hand in order to optimize cell size
      var computedTableWidth;
  
      // year
      if (zoom == "y") {
        computedTableWidth = Math.floor(((endPeriod - startPeriod) / (3600000 * 24 * 180)) * 100); //180gg = 1 sem = 100px
        iterate(function (date) {
          tr1.append(createHeadCell(date.format("yyyy"), 2));
          date.setFullYear(date.getFullYear() + 1);
        }, function (date) {
          var sem = (Math.floor(date.getMonth() / 6) + 1);
          tr2.append(createHeadCell(GanttMaster.messages["GANTT_SEMESTER_SHORT"] + sem, 1, null, 100));
          trBody.append(createBodyCell(1, sem == 2));
          date.setMonth(date.getMonth() + 6);
        });
  
        //semester
      } else if (zoom == "s") {
        computedTableWidth = Math.floor(((endPeriod - startPeriod) / (3600000 * 24 * 90)) * 100); //90gg = 1 quarter = 100px
        iterate(function (date) {
          var end = new Date(date.getTime());
          end.setMonth(end.getMonth() + 6);
          end.setDate(end.getDate() - 1);
          tr1.append(createHeadCell(date.format("MMM") + " - " + end.format("MMM yyyy"), 2));
          date.setMonth(date.getMonth() + 6);
        }, function (date) {
          var quarter = ( Math.floor(date.getMonth() / 3) + 1);
          tr2.append(createHeadCell(GanttMaster.messages["GANTT_QUARTER_SHORT"] + quarter, 1, null, 100));
          trBody.append(createBodyCell(1, quarter % 2 == 0));
          date.setMonth(date.getMonth() + 3);
        });
  
        //quarter
      } else if (zoom == "q") {
        computedTableWidth = Math.floor(((endPeriod - startPeriod) / (3600000 * 24 * 30)) * 300); //1 month= 300px
        iterate(function (date) {
          var end = new Date(date.getTime());
          end.setMonth(end.getMonth() + 3);
          end.setDate(end.getDate() - 1);
          tr1.append(createHeadCell(date.format("MMM") + " - " + end.format("MMM yyyy"), 3));
          date.setMonth(date.getMonth() + 3);
        }, function (date) {
          var lbl = date.format("MMM");
          tr2.append(createHeadCell(lbl, 1, null, 300));
          trBody.append(createBodyCell(1, date.getMonth() % 3 == 2));
          date.setMonth(date.getMonth() + 1);
        });
  
        //month
      } else if (zoom == "m") {
        computedTableWidth = Math.floor(((endPeriod - startPeriod) / (3600000 * 24 * 1)) * 30); //1 day= 20px
        iterate(function (date) {
          var sm = date.getTime();
          date.setMonth(date.getMonth() + 1);
          var daysInMonth = Math.round((date.getTime() - sm) / (3600000 * 24));
          daysInMonth = moment.jDaysInMonth(moment(new Date(sm)).format("jYYYY"), moment(new Date(sm)).jMonth());

            var limitDate = new Date(moment(sm).add(10, 'day')).getTime();
            if(limitDate < endPeriod)
                tr1.append(createHeadCell(moment(new Date(sm)).add(10, 'day').format("jMMMM jYYYY"), daysInMonth)); //spans mumber of dayn in the month
        }, function (date) {
          tr2.append(createHeadCell(moment(date).format("jD"), 1, isHoliday(date) ? "holyH" : null, 25));
          var nd = new Date(date.getTime());
          nd.setDate(date.getDate() + 1);
          trBody.append(createBodyCell(1, moment(nd).format("jD") == 1, isHoliday(date) ? "holy" : null));
          date.setDate(date.getDate() + 1);
        });
  
        //week
      } else if (zoom == "w") {
        computedTableWidth = Math.floor(((endPeriod - startPeriod) / (3600000 * 24)) * 40); //1 day= 40px
        iterate(function (date) {
          var end = new Date(date.getTime());
          end.setDate(end.getDate() + 6);
          tr1.append(createHeadCell(date.format("MMM d") + " - " + end.format("MMM d'yy"), 7));
          date.setDate(date.getDate() + 7);
        }, function (date) {
          tr2.append(createHeadCell(date.format("EEEE").substr(0, 1), 1, isHoliday(date) ? "holyH" : null, 40));
          trBody.append(createBodyCell(1, date.getDay() % 7 == (self.master.firstDayOfWeek + 6) % 7, isHoliday(date) ? "holy" : null));
          date.setDate(date.getDate() + 1);
        });
  
        //days
      } else if (zoom == "d") {
        computedTableWidth = Math.floor(((endPeriod - startPeriod) / (3600000 * 24)) * 100); //1 day= 100px
        iterate(function (date) {
          var end = new Date(date.getTime());
          end.setDate(end.getDate() + 6);
          tr1.append(createHeadCell(date.format("MMMM d") + " - " + end.format("MMMM d yyyy"), 7));
          date.setDate(date.getDate() + 7);
        }, function (date) {
          tr2.append(createHeadCell(date.format("EEE d"), 1, isHoliday(date) ? "holyH" : null, 100));
          trBody.append(createBodyCell(1, date.getDay() % 7 == (self.master.firstDayOfWeek + 6) % 7, isHoliday(date) ? "holy" : null));
          date.setDate(date.getDate() + 1);
        });
  
      } else {
        console.error("Wrong level " + zoom);
      }
  
      //set a minimal width
      computedTableWidth = Math.max(computedTableWidth, self.minGanttSize);
  
      var table = $("<table cellspacing=0 cellpadding=0>");
      table.append(tr1).append(tr2).css({width:computedTableWidth});
  
      var head = table.clone().addClass("fixHead");
  
      table.append(trBody).addClass("ganttTable");
  
  
      var height = self.master.editor.element.height();
      table.height(height);
  
      var box = $("<div>");
      box.addClass("gantt unselectable").attr("unselectable", "true").css({position:"relative", width:computedTableWidth});
      box.append(table);
  
      box.append(head);
  
  
      //highlightBar
      var hlb = $("<div>").addClass("ganttHighLight");
      box.append(hlb);
      self.highlightBar = hlb;
  
  
      var rowHeight = 30; // todo get it from css?
      //create the svg
      box.svg({settings:{class:"ganttSVGBox"},
        onLoad:         function (svg) {
          //console.debug("svg loaded", svg);
  
          //creates gradient and definitions
          var defs = svg.defs('myDefs');
          svg.linearGradient(defs, 'taskGrad', [
            [0, '#ddd'],
            [.5, '#fff'],
            [1, '#ddd']
          ], 0, 0, 0, "100%");
  
          //create backgound
          var extDep = svg.pattern(defs, "extDep", 0, 0, 40, 40, 0, 0, 40, 40, {patternUnits:'userSpaceOnUse'});
          svg.image(extDep, 0, 0, 40, 40, "libraries/jquery/gantt/res/hasExternalDeps.png");
  
          self.svg = svg;
          $(svg).addClass("ganttSVGBox");
  
          //creates grid group
          var gridGroup = svg.group("gridGroup");
  
          //creates rows grid
          for (var i = 40; i <= height; i += rowHeight)
            svg.line(gridGroup, 0, i, "100%", i, {class:"ganttLinesSVG"});
  
          //creates links group
          self.linksGroup = svg.group("linksGroup");
  
          //creates tasks group
          self.tasksGroup = svg.group("tasksGroup");
  
          //compute scalefactor fx
          self.fx = computedTableWidth / (endPeriod - startPeriod);
  
          // drawTodayLine
          if (new Date().getTime() > self.startMillis && new Date().getTime() < self.endMillis) {
            var x = Math.round(((new Date().getTime()) - self.startMillis) * self.fx);
            svg.line(gridGroup, x, 0, x, "100%", {class:"ganttTodaySVG"});
          }
  
        }
      });
  
      return box;
    }  
    //if include today synch extremes
    if (this.includeToday) {
      var today = new Date().getTime();
      originalStartmillis = originalStartmillis > today ? today : originalStartmillis;
      originalEndMillis = originalEndMillis < today ? today : originalEndMillis;
    }

  
    //get best dimension fo gantt
    var period = getPeriod(zoom, originalStartmillis, originalEndMillis); //this is enlarged to match complete periods basing on zoom level
    //console.debug(new Date(period.start) + "   " + new Date(period.end));
    self.startMillis = period.start; //real dimension of gantt
    self.endMillis = period.end;
    self.originalStartMillis = originalStartmillis; //minimal dimension required by user or by task duration
    self.originalEndMillis = originalEndMillis;
  
    var table = createGantt(zoom, period.start, period.end);
  
    return table;
  })