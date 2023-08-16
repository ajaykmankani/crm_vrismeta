<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>503 Service Unavailable</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css" integrity="sha256-HxaKz5E/eBbvhGMNwhWRPrAR9i/lG1JeT4mD6hCQ7s4=" crossorigin="anonymous"/>
        <style>
            body {
                background: #18121A;
                font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen,Ubuntu,Cantarell,Fira Sans,Droid Sans,Helvetica Neue,sans-serif
            }

            body,html {
                margin: 0;
                padding: 0;
                width: 100%;
                height: 100%;
                display: table
            }

            .wrapper {
                display: table-cell;
                vertical-align: middle
            }

            .glitch {
                color: #fff;
                font-size: 100px;
                position: relative;
                width: 640px;
                margin: 0 auto
            }

            .glitch:after,.glitch:before {
                content: attr(data-text);
                position: absolute;
                top: 0;
                color: #fff;
                background: #18121A;
                overflow: hidden
            }

            @keyframes noise-anim {
                0% {
                    clip: rect(44px,9999px,32px,0)
                }

                5% {
                    clip: rect(70px,9999px,10px,0)
                }

                10% {
                    clip: rect(81px,9999px,10px,0)
                }

                15.0% {
                    clip: rect(77px,9999px,64px,0)
                }

                20% {
                    clip: rect(24px,9999px,87px,0)
                }

                25% {
                    clip: rect(40px,9999px,65px,0)
                }

                30.0% {
                    clip: rect(87px,9999px,90px,0)
                }

                35% {
                    clip: rect(50px,9999px,14px,0)
                }

                40% {
                    clip: rect(100px,9999px,19px,0)
                }

                45% {
                    clip: rect(16px,9999px,7px,0)
                }

                50% {
                    clip: rect(17px,9999px,91px,0)
                }

                55.0% {
                    clip: rect(84px,9999px,2px,0)
                }

                60.0% {
                    clip: rect(36px,9999px,9px,0)
                }

                65% {
                    clip: rect(66px,9999px,3px,0)
                }

                70% {
                    clip: rect(25px,9999px,69px,0)
                }

                75% {
                    clip: rect(72px,9999px,67px,0)
                }

                80% {
                    clip: rect(28px,9999px,40px,0)
                }

                85.0% {
                    clip: rect(6px,9999px,80px,0)
                }

                90% {
                    clip: rect(58px,9999px,42px,0)
                }

                95% {
                    clip: rect(22px,9999px,87px,0)
                }

                100% {
                    clip: rect(97px,9999px,58px,0)
                }
            }

            .glitch:after {
                left: 2px;
                text-shadow: -2px 0 red;
                clip: rect(0,900px,0,0);
                animation: noise-anim 2s infinite linear alternate-reverse
            }

            @keyframes noise-anim-2 {
                0% {
                    clip: rect(66px,9999px,73px,0)
                }

                5% {
                    clip: rect(31px,9999px,97px,0)
                }

                10% {
                    clip: rect(91px,9999px,84px,0)
                }

                15.0% {
                    clip: rect(51px,9999px,72px,0)
                }

                20% {
                    clip: rect(79px,9999px,33px,0)
                }

                25% {
                    clip: rect(81px,9999px,20px,0)
                }

                30.0% {
                    clip: rect(86px,9999px,64px,0)
                }

                35% {
                    clip: rect(88px,9999px,98px,0)
                }

                40% {
                    clip: rect(69px,9999px,6px,0)
                }

                45% {
                    clip: rect(24px,9999px,68px,0)
                }

                50% {
                    clip: rect(91px,9999px,79px,0)
                }

                55.0% {
                    clip: rect(75px,9999px,79px,0)
                }

                60.0% {
                    clip: rect(84px,9999px,32px,0)
                }

                65% {
                    clip: rect(90px,9999px,2px,0)
                }

                70% {
                    clip: rect(42px,9999px,84px,0)
                }

                75% {
                    clip: rect(48px,9999px,14px,0)
                }

                80% {
                    clip: rect(79px,9999px,91px,0)
                }

                85.0% {
                    clip: rect(77px,9999px,6px,0)
                }

                90% {
                    clip: rect(99px,9999px,75px,0)
                }

                95% {
                    clip: rect(76px,9999px,60px,0)
                }

                100% {
                    clip: rect(4px,9999px,50px,0)
                }
            }

            .glitch:before {
                left: -5px;
                text-shadow: 2px 0 #00f;
                clip: rect(0,900px,0,0);
                animation: noise-anim-2 3s infinite linear alternate-reverse
            }
        </style>
        <script type="text/javascript">
            !function() {
                function e(e, r) {
                    return [].slice.call((r || document).querySelectorAll(e))
                }
                if (window.addEventListener) {
                    var r = window.StyleFix = {
                        link: function(e) {
                            try {
                                if ("stylesheet" !== e.rel || e.hasAttribute("data-noprefix"))
                                    return
                            } catch (t) {
                                return
                            }
                            var n, i = e.href || e.getAttribute("data-href"), a = i.replace(/[^\/]+$/, ""), o = (/^[a-z]{3,10}:/.exec(a) || [""])[0], s = (/^[a-z]{3,10}:\/\/[^\/]+/.exec(a) || [""])[0], l = /^([^?]*)\??/.exec(i)[1], u = e.parentNode, p = new XMLHttpRequest;
                            p.onreadystatechange = function() {
                                4 === p.readyState && n()
                            }
                            ,
                            n = function() {
                                var t = p.responseText;
                                if (t && e.parentNode && (!p.status || p.status < 400 || p.status > 600)) {
                                    if (t = r.fix(t, !0, e),
                                    a) {
                                        t = t.replace(/url\(\s*?((?:"|')?)(.+?)\1\s*?\)/gi, function(e, r, t) {
                                            return /^([a-z]{3,10}:|#)/i.test(t) ? e : /^\/\//.test(t) ? 'url("' + o + t + '")' : /^\//.test(t) ? 'url("' + s + t + '")' : /^\?/.test(t) ? 'url("' + l + t + '")' : 'url("' + a + t + '")'
                                        });
                                        var n = a.replace(/([\\\^\$*+[\]?{}.=!:(|)])/g, "\\$1");
                                        t = t.replace(RegExp("\\b(behavior:\\s*?url\\('?\"?)" + n, "gi"), "$1")
                                    }
                                    var i = document.createElement("style");
                                    i.textContent = t,
                                    i.media = e.media,
                                    i.disabled = e.disabled,
                                    i.setAttribute("data-href", e.getAttribute("href")),
                                    u.insertBefore(i, e),
                                    u.removeChild(e),
                                    i.media = e.media
                                }
                            }
                            ;
                            try {
                                p.open("GET", i),
                                p.send(null)
                            } catch (t) {
                                "undefined" != typeof XDomainRequest && (p = new XDomainRequest,
                                p.onerror = p.onprogress = function() {}
                                ,
                                p.onload = n,
                                p.open("GET", i),
                                p.send(null))
                            }
                            e.setAttribute("data-inprogress", "")
                        },
                        styleElement: function(e) {
                            if (!e.hasAttribute("data-noprefix")) {
                                var t = e.disabled;
                                e.textContent = r.fix(e.textContent, !0, e),
                                e.disabled = t
                            }
                        },
                        styleAttribute: function(e) {
                            var t = e.getAttribute("style");
                            t = r.fix(t, !1, e),
                            e.setAttribute("style", t)
                        },
                        process: function() {
                            e("style").forEach(StyleFix.styleElement),
                            e("[style]").forEach(StyleFix.styleAttribute)
                        },
                        register: function(e, t) {
                            (r.fixers = r.fixers || []).splice(void 0 === t ? r.fixers.length : t, 0, e)
                        },
                        fix: function(e, t, n) {
                            for (var i = 0; i < r.fixers.length; i++)
                                e = r.fixers[i](e, t, n) || e;
                            return e
                        },
                        camelCase: function(e) {
                            return e.replace(/-([a-z])/g, function(e, r) {
                                return r.toUpperCase()
                            }).replace("-", "")
                        },
                        deCamelCase: function(e) {
                            return e.replace(/[A-Z]/g, function(e) {
                                return "-" + e.toLowerCase()
                            })
                        }
                    };
                    !function() {
                        setTimeout(function() {}, 10),
                        document.addEventListener("DOMContentLoaded", StyleFix.process, !1)
                    }()
                }
            }(),
            function(e) {
                function r(e, r, n, i, a) {
                    if (e = t[e],
                    e.length) {
                        var o = RegExp(r + "(" + e.join("|") + ")" + n, "gi");
                        a = a.replace(o, i)
                    }
                    return a
                }
                if (window.StyleFix && window.getComputedStyle) {
                    var t = window.PrefixFree = {
                        prefixCSS: function(e, n) {
                            var i = t.prefix;
                            if (t.functions.indexOf("linear-gradient") > -1 && (e = e.replace(/(\s|:|,)(repeating-)?linear-gradient\(\s*(-?\d*\.?\d*)deg/gi, function(e, r, t, n) {
                                return r + (t || "") + "linear-gradient(" + (90 - n) + "deg"
                            })),
                            e = r("functions", "(\\s|:|,)", "\\s*\\(", "$1" + i + "$2(", e),
                            e = r("keywords", "(\\s|:)", "(\\s|;|\\}|$)", "$1" + i + "$2$3", e),
                            e = r("properties", "(^|\\{|\\s|;)", "\\s*:", "$1" + i + "$2:", e),
                            t.properties.length) {
                                var a = RegExp("\\b(" + t.properties.join("|") + ")(?!:)", "gi");
                                e = r("valueProperties", "\\b", ":(.+?);", function(e) {
                                    return e.replace(a, i + "$1")
                                }, e)
                            }
                            return n && (e = r("selectors", "", "\\b", t.prefixSelector, e),
                            e = r("atrules", "@", "\\b", "@" + i + "$1", e)),
                            e = e.replace(RegExp("-" + i, "g"), "-"),
                            e = e.replace(/-\*-(?=[a-z]+)/gi, t.prefix)
                        },
                        property: function(e) {
                            return (t.properties.indexOf(e) ? t.prefix : "") + e
                        },
                        value: function(e) {
                            return e = r("functions", "(^|\\s|,)", "\\s*\\(", "$1" + t.prefix + "$2(", e),
                            e = r("keywords", "(^|\\s)", "(\\s|$)", "$1" + t.prefix + "$2$3", e)
                        },
                        prefixSelector: function(e) {
                            return e.replace(/^:{1,2}/, function(e) {
                                return e + t.prefix
                            })
                        },
                        prefixProperty: function(e, r) {
                            var n = t.prefix + e;
                            return r ? StyleFix.camelCase(n) : n
                        }
                    };
                    !function() {
                        var e = {}
                          , r = []
                          , n = getComputedStyle(document.documentElement, null)
                          , i = document.createElement("div").style
                          , a = function(t) {
                            if ("-" === t.charAt(0)) {
                                r.push(t);
                                var n = t.split("-")
                                  , i = n[1];
                                for (e[i] = ++e[i] || 1; n.length > 3; ) {
                                    n.pop();
                                    var a = n.join("-");
                                    o(a) && -1 === r.indexOf(a) && r.push(a)
                                }
                            }
                        }
                          , o = function(e) {
                            return StyleFix.camelCase(e)in i
                        };
                        if (n.length > 0)
                            for (var s = 0; s < n.length; s++)
                                a(n[s]);
                        else
                            for (var l in n)
                                a(StyleFix.deCamelCase(l));
                        var u = {
                            uses: 0
                        };
                        for (var p in e) {
                            var f = e[p];
                            u.uses < f && (u = {
                                prefix: p,
                                uses: f
                            })
                        }
                        t.prefix = "-" + u.prefix + "-",
                        t.Prefix = StyleFix.camelCase(t.prefix),
                        t.properties = [];
                        for (var s = 0; s < r.length; s++) {
                            var l = r[s];
                            if (0 === l.indexOf(t.prefix)) {
                                var c = l.slice(t.prefix.length);
                                o(c) || t.properties.push(c)
                            }
                        }
                        "Ms" != t.Prefix || "transform"in i || "MsTransform"in i || !("msTransform"in i) || t.properties.push("transform", "transform-origin"),
                        t.properties.sort()
                    }(),
                    function() {
                        function e(e, r) {
                            return i[r] = "",
                            i[r] = e,
                            !!i[r]
                        }
                        var r = {
                            "linear-gradient": {
                                property: "backgroundImage",
                                params: "red, teal"
                            },
                            calc: {
                                property: "width",
                                params: "1px + 5%"
                            },
                            element: {
                                property: "backgroundImage",
                                params: "#foo"
                            },
                            "cross-fade": {
                                property: "backgroundImage",
                                params: "url(a.png), url(b.png), 50%"
                            }
                        };
                        r["repeating-linear-gradient"] = r["repeating-radial-gradient"] = r["radial-gradient"] = r["linear-gradient"];
                        var n = {
                            initial: "color",
                            "zoom-in": "cursor",
                            "zoom-out": "cursor",
                            box: "display",
                            flexbox: "display",
                            "inline-flexbox": "display",
                            flex: "display",
                            "inline-flex": "display",
                            grid: "display",
                            "inline-grid": "display",
                            "min-content": "width"
                        };
                        t.functions = [],
                        t.keywords = [];
                        var i = document.createElement("div").style;
                        for (var a in r) {
                            var o = r[a]
                              , s = o.property
                              , l = a + "(" + o.params + ")";
                            !e(l, s) && e(t.prefix + l, s) && t.functions.push(a)
                        }
                        for (var u in n) {
                            var s = n[u];
                            !e(u, s) && e(t.prefix + u, s) && t.keywords.push(u)
                        }
                    }(),
                    function() {
                        function r(e) {
                            return a.textContent = e + "{}",
                            !!a.sheet.cssRules.length
                        }
                        var n = {
                            ":read-only": null,
                            ":read-write": null,
                            ":any-link": null,
                            "::selection": null
                        }
                          , i = {
                            keyframes: "name",
                            viewport: null,
                            document: 'regexp(".")'
                        };
                        t.selectors = [],
                        t.atrules = [];
                        var a = e.appendChild(document.createElement("style"));
                        for (var o in n) {
                            var s = o + (n[o] ? "(" + n[o] + ")" : "");
                            !r(s) && r(t.prefixSelector(s)) && t.selectors.push(o)
                        }
                        for (var l in i) {
                            var s = l + " " + (i[l] || "");
                            !r("@" + s) && r("@" + t.prefix + s) && t.atrules.push(l)
                        }
                        e.removeChild(a)
                    }(),
                    t.valueProperties = ["transition", "transition-property"],
                    e.className += " " + t.prefix,
                    StyleFix.register(t.prefixCSS)
                }
            }(document.documentElement);
        </script>
    </head>
    <body>
        <div class="wrapper">
            <div class="glitch" data-text="Error" style="font-size: 168px;">503</div>
            <div class="glitch" data-text="Service Unavailable..">Service Unavailable</div>
        </div>
    </body>
</html>
