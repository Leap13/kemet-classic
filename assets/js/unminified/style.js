/**
 * Flexibility is a JavaScript polyfill for Flexbox By Jonathan Neal, 10up. (https://github.com/jonathantneal/flexibility)
 * Licensed under MIT ( https://github.com/jonathantneal/flexibility/blob/master/LICENSE.md )
 */

! function() {
    window.flexibility = {}, Array.prototype.forEach || (Array.prototype.forEach = function(t) {
            if (void 0 === this || null === this) throw new TypeError(this + "is not an object");
            if (!(t instanceof Function)) throw new TypeError(t + " is not a function");
            for (var e = Object(this), i = arguments[1], n = e instanceof String ? e.split("") : e, r = Math.max(Math.min(n.length, 9007199254740991), 0) || 0, o = -1; ++o < r;) o in n && t.call(i, n[o], o, e)
        }),
        function(t, e) {
            "function" == typeof define && define.amd ? define([], e) : "object" == typeof exports ? module.exports = e() : t.computeLayout = e()
        }(flexibility, function() {
            var t = function() {
                function t(e) {
                    if ((!e.layout || e.isDirty) && (e.layout = {
                            width: void 0,
                            height: void 0,
                            top: 0,
                            left: 0,
                            right: 0,
                            bottom: 0
                        }), e.style || (e.style = {}), e.children || (e.children = []), e.style.measure && e.children && e.children.length) throw new Error("Using custom measure function is supported only for leaf nodes.");
                    return e.children.forEach(t), e
                }

                function e(t) {
                    return void 0 === t
                }

                function i(t) {
                    return t === q || t === G
                }

                function n(t) {
                    return t === U || t === Z
                }

                function r(t, e) {
                    if (void 0 !== t.style.marginStart && i(e)) return t.style.marginStart;
                    var n = null;
                    switch (e) {
                        case "row":
                            n = t.style.marginLeft;
                            break;
                        case "row-reverse":
                            n = t.style.marginRight;
                            break;
                        case "column":
                            n = t.style.marginTop;
                            break;
                        case "column-reverse":
                            n = t.style.marginBottom
                    }
                    return void 0 !== n ? n : void 0 !== t.style.margin ? t.style.margin : 0
                }

                function o(t, e) {
                    if (void 0 !== t.style.marginEnd && i(e)) return t.style.marginEnd;
                    var n = null;
                    switch (e) {
                        case "row":
                            n = t.style.marginRight;
                            break;
                        case "row-reverse":
                            n = t.style.marginLeft;
                            break;
                        case "column":
                            n = t.style.marginBottom;
                            break;
                        case "column-reverse":
                            n = t.style.marginTop
                    }
                    return null != n ? n : void 0 !== t.style.margin ? t.style.margin : 0
                }

                function l(t, e) {
                    if (void 0 !== t.style.paddingStart && t.style.paddingStart >= 0 && i(e)) return t.style.paddingStart;
                    var n = null;
                    switch (e) {
                        case "row":
                            n = t.style.paddingLeft;
                            break;
                        case "row-reverse":
                            n = t.style.paddingRight;
                            break;
                        case "column":
                            n = t.style.paddingTop;
                            break;
                        case "column-reverse":
                            n = t.style.paddingBottom
                    }
                    return null != n && n >= 0 ? n : void 0 !== t.style.padding && t.style.padding >= 0 ? t.style.padding : 0
                }

                function a(t, e) {
                    if (void 0 !== t.style.paddingEnd && t.style.paddingEnd >= 0 && i(e)) return t.style.paddingEnd;
                    var n = null;
                    switch (e) {
                        case "row":
                            n = t.style.paddingRight;
                            break;
                        case "row-reverse":
                            n = t.style.paddingLeft;
                            break;
                        case "column":
                            n = t.style.paddingBottom;
                            break;
                        case "column-reverse":
                            n = t.style.paddingTop
                    }
                    return null != n && n >= 0 ? n : void 0 !== t.style.padding && t.style.padding >= 0 ? t.style.padding : 0
                }

                function d(t, e) {
                    if (void 0 !== t.style.borderStartWidth && t.style.borderStartWidth >= 0 && i(e)) return t.style.borderStartWidth;
                    var n = null;
                    switch (e) {
                        case "row":
                            n = t.style.borderLeftWidth;
                            break;
                        case "row-reverse":
                            n = t.style.borderRightWidth;
                            break;
                        case "column":
                            n = t.style.borderTopWidth;
                            break;
                        case "column-reverse":
                            n = t.style.borderBottomWidth
                    }
                    return null != n && n >= 0 ? n : void 0 !== t.style.borderWidth && t.style.borderWidth >= 0 ? t.style.borderWidth : 0
                }

                function s(t, e) {
                    if (void 0 !== t.style.borderEndWidth && t.style.borderEndWidth >= 0 && i(e)) return t.style.borderEndWidth;
                    var n = null;
                    switch (e) {
                        case "row":
                            n = t.style.borderRightWidth;
                            break;
                        case "row-reverse":
                            n = t.style.borderLeftWidth;
                            break;
                        case "column":
                            n = t.style.borderBottomWidth;
                            break;
                        case "column-reverse":
                            n = t.style.borderTopWidth
                    }
                    return null != n && n >= 0 ? n : void 0 !== t.style.borderWidth && t.style.borderWidth >= 0 ? t.style.borderWidth : 0
                }

                function u(t, e) {
                    return l(t, e) + d(t, e)
                }

                function y(t, e) {
                    return a(t, e) + s(t, e)
                }

                function c(t, e) {
                    return d(t, e) + s(t, e)
                }

                function f(t, e) {
                    return r(t, e) + o(t, e)
                }

                function h(t, e) {
                    return u(t, e) + y(t, e)
                }

                function m(t) {
                    return t.style.justifyContent ? t.style.justifyContent : "flex-start"
                }

                function v(t) {
                    return t.style.alignContent ? t.style.alignContent : "flex-start"
                }

                function p(t, e) {
                    return e.style.alignSelf ? e.style.alignSelf : t.style.alignItems ? t.style.alignItems : "stretch"
                }

                function x(t, e) {
                    if (e === N) {
                        if (t === q) return G;
                        if (t === G) return q
                    }
                    return t
                }

                function g(t, e) {
                    var i;
                    return i = t.style.direction ? t.style.direction : M, i === M && (i = void 0 === e ? A : e), i
                }

                function b(t) {
                    return t.style.flexDirection ? t.style.flexDirection : U
                }

                function w(t, e) {
                    return n(t) ? x(q, e) : U
                }

                function W(t) {
                    return t.style.position ? t.style.position : "relative"
                }

                function L(t) {
                    return W(t) === tt && t.style.flex > 0
                }

                function E(t) {
                    return "wrap" === t.style.flexWrap
                }

                function S(t, e) {
                    return t.layout[ot[e]] + f(t, e)
                }

                function k(t, e) {
                    return void 0 !== t.style[ot[e]] && t.style[ot[e]] >= 0
                }

                function C(t, e) {
                    return void 0 !== t.style[e]
                }

                function T(t) {
                    return void 0 !== t.style.measure
                }

                function $(t, e) {
                    return void 0 !== t.style[e] ? t.style[e] : 0
                }

                function H(t, e, i) {
                    var n = {
                            row: t.style.minWidth,
                            "row-reverse": t.style.minWidth,
                            column: t.style.minHeight,
                            "column-reverse": t.style.minHeight
                        }[e],
                        r = {
                            row: t.style.maxWidth,
                            "row-reverse": t.style.maxWidth,
                            column: t.style.maxHeight,
                            "column-reverse": t.style.maxHeight
                        }[e],
                        o = i;
                    return void 0 !== r && r >= 0 && o > r && (o = r), void 0 !== n && n >= 0 && n > o && (o = n), o
                }

                function z(t, e) {
                    return t > e ? t : e
                }

                function B(t, e) {
                    void 0 === t.layout[ot[e]] && k(t, e) && (t.layout[ot[e]] = z(H(t, e, t.style[ot[e]]), h(t, e)))
                }

                function D(t, e, i) {
                    e.layout[nt[i]] = t.layout[ot[i]] - e.layout[ot[i]] - e.layout[rt[i]]
                }

                function I(t, e) {
                    return void 0 !== t.style[it[e]] ? $(t, it[e]) : -$(t, nt[e])
                }

                function R(t, n, l, a) {
                    var s = g(t, a),
                        R = x(b(t), s),
                        M = w(R, s),
                        A = x(q, s);
                    B(t, R), B(t, M), t.layout.direction = s, t.layout[it[R]] += r(t, R) + I(t, R), t.layout[nt[R]] += o(t, R) + I(t, R), t.layout[it[M]] += r(t, M) + I(t, M), t.layout[nt[M]] += o(t, M) + I(t, M);
                    var N = t.children.length,
                        lt = h(t, A),
                        at = h(t, U);
                    if (T(t)) {
                        var dt = !e(t.layout[ot[A]]),
                            st = F;
                        st = k(t, A) ? t.style.width : dt ? t.layout[ot[A]] : n - f(t, A), st -= lt;
                        var ut = F;
                        ut = k(t, U) ? t.style.height : e(t.layout[ot[U]]) ? l - f(t, A) : t.layout[ot[U]], ut -= h(t, U);
                        var yt = !k(t, A) && !dt,
                            ct = !k(t, U) && e(t.layout[ot[U]]);
                        if (yt || ct) {
                            var ft = t.style.measure(st, ut);
                            yt && (t.layout.width = ft.width + lt), ct && (t.layout.height = ft.height + at)
                        }
                        if (0 === N) return
                    }
                    var ht, mt, vt, pt, xt = E(t),
                        gt = m(t),
                        bt = u(t, R),
                        wt = u(t, M),
                        Wt = h(t, R),
                        Lt = h(t, M),
                        Et = !e(t.layout[ot[R]]),
                        St = !e(t.layout[ot[M]]),
                        kt = i(R),
                        Ct = null,
                        Tt = null,
                        $t = F;
                    Et && ($t = t.layout[ot[R]] - Wt);
                    for (var Ht = 0, zt = 0, Bt = 0, Dt = 0, It = 0, Rt = 0; N > zt;) {
                        var jt, Ft, Mt = 0,
                            At = 0,
                            Nt = 0,
                            qt = 0,
                            Gt = Et && gt === O || !Et && gt !== _,
                            Ut = Gt ? N : Ht,
                            Zt = !0,
                            Ot = N,
                            _t = null,
                            Jt = null,
                            Kt = bt,
                            Pt = 0;
                        for (ht = Ht; N > ht; ++ht) {
                            vt = t.children[ht], vt.lineIndex = Rt, vt.nextAbsoluteChild = null, vt.nextFlexChild = null;
                            var Qt = p(t, vt);
                            if (Qt === Y && W(vt) === tt && St && !k(vt, M)) vt.layout[ot[M]] = z(H(vt, M, t.layout[ot[M]] - Lt - f(vt, M)), h(vt, M));
                            else if (W(vt) === et)
                                for (null === Ct && (Ct = vt), null !== Tt && (Tt.nextAbsoluteChild = vt), Tt = vt, mt = 0; 2 > mt; mt++) pt = 0 !== mt ? q : U, !e(t.layout[ot[pt]]) && !k(vt, pt) && C(vt, it[pt]) && C(vt, nt[pt]) && (vt.layout[ot[pt]] = z(H(vt, pt, t.layout[ot[pt]] - h(t, pt) - f(vt, pt) - $(vt, it[pt]) - $(vt, nt[pt])), h(vt, pt)));
                            var Vt = 0;
                            if (Et && L(vt) ? (At++, Nt += vt.style.flex, null === _t && (_t = vt), null !== Jt && (Jt.nextFlexChild = vt), Jt = vt, Vt = h(vt, R) + f(vt, R)) : (jt = F, Ft = F, kt ? Ft = k(t, U) ? t.layout[ot[U]] - at : l - f(t, U) - at : jt = k(t, A) ? t.layout[ot[A]] - lt : n - f(t, A) - lt, 0 === Bt && j(vt, jt, Ft, s), W(vt) === tt && (qt++, Vt = S(vt, R))), xt && Et && Mt + Vt > $t && ht !== Ht) {
                                qt--, Bt = 1;
                                break
                            }
                            Gt && (W(vt) !== tt || L(vt)) && (Gt = !1, Ut = ht), Zt && (W(vt) !== tt || Qt !== Y && Qt !== Q || e(vt.layout[ot[M]])) && (Zt = !1, Ot = ht), Gt && (vt.layout[rt[R]] += Kt, Et && D(t, vt, R), Kt += S(vt, R), Pt = z(Pt, H(vt, M, S(vt, M)))), Zt && (vt.layout[rt[M]] += Dt + wt, St && D(t, vt, M)), Bt = 0, Mt += Vt, zt = ht + 1
                        }
                        var Xt = 0,
                            Yt = 0,
                            te = 0;
                        if (te = Et ? $t - Mt : z(Mt, 0) - Mt, 0 !== At) {
                            var ee, ie, ne = te / Nt;
                            for (Jt = _t; null !== Jt;) ee = ne * Jt.style.flex + h(Jt, R), ie = H(Jt, R, ee), ee !== ie && (te -= ie, Nt -= Jt.style.flex), Jt = Jt.nextFlexChild;
                            for (ne = te / Nt, 0 > ne && (ne = 0), Jt = _t; null !== Jt;) Jt.layout[ot[R]] = H(Jt, R, ne * Jt.style.flex + h(Jt, R)), jt = F, k(t, A) ? jt = t.layout[ot[A]] - lt : kt || (jt = n - f(t, A) - lt), Ft = F, k(t, U) ? Ft = t.layout[ot[U]] - at : kt && (Ft = l - f(t, U) - at), j(Jt, jt, Ft, s), vt = Jt, Jt = Jt.nextFlexChild, vt.nextFlexChild = null
                        } else gt !== O && (gt === _ ? Xt = te / 2 : gt === J ? Xt = te : gt === K ? (te = z(te, 0), Yt = At + qt - 1 !== 0 ? te / (At + qt - 1) : 0) : gt === P && (Yt = te / (At + qt), Xt = Yt / 2));
                        for (Kt += Xt, ht = Ut; zt > ht; ++ht) vt = t.children[ht], W(vt) === et && C(vt, it[R]) ? vt.layout[rt[R]] = $(vt, it[R]) + d(t, R) + r(vt, R) : (vt.layout[rt[R]] += Kt, Et && D(t, vt, R), W(vt) === tt && (Kt += Yt + S(vt, R), Pt = z(Pt, H(vt, M, S(vt, M)))));
                        var re = t.layout[ot[M]];
                        for (St || (re = z(H(t, M, Pt + Lt), Lt)), ht = Ot; zt > ht; ++ht)
                            if (vt = t.children[ht], W(vt) === et && C(vt, it[M])) vt.layout[rt[M]] = $(vt, it[M]) + d(t, M) + r(vt, M);
                            else {
                                var oe = wt;
                                if (W(vt) === tt) {
                                    var Qt = p(t, vt);
                                    if (Qt === Y) e(vt.layout[ot[M]]) && (vt.layout[ot[M]] = z(H(vt, M, re - Lt - f(vt, M)), h(vt, M)));
                                    else if (Qt !== Q) {
                                        var le = re - Lt - S(vt, M);
                                        oe += Qt === V ? le / 2 : le
                                    }
                                }
                                vt.layout[rt[M]] += Dt + oe, St && D(t, vt, M)
                            }
                        Dt += Pt, It = z(It, Kt), Rt += 1, Ht = zt
                    }
                    if (Rt > 1 && St) {
                        var ae = t.layout[ot[M]] - Lt,
                            de = ae - Dt,
                            se = 0,
                            ue = wt,
                            ye = v(t);
                        ye === X ? ue += de : ye === V ? ue += de / 2 : ye === Y && ae > Dt && (se = de / Rt);
                        var ce = 0;
                        for (ht = 0; Rt > ht; ++ht) {
                            var fe = ce,
                                he = 0;
                            for (mt = fe; N > mt; ++mt)
                                if (vt = t.children[mt], W(vt) === tt) {
                                    if (vt.lineIndex !== ht) break;
                                    e(vt.layout[ot[M]]) || (he = z(he, vt.layout[ot[M]] + f(vt, M)))
                                }
                            for (ce = mt, he += se, mt = fe; ce > mt; ++mt)
                                if (vt = t.children[mt], W(vt) === tt) {
                                    var me = p(t, vt);
                                    if (me === Q) vt.layout[rt[M]] = ue + r(vt, M);
                                    else if (me === X) vt.layout[rt[M]] = ue + he - o(vt, M) - vt.layout[ot[M]];
                                    else if (me === V) {
                                        var ve = vt.layout[ot[M]];
                                        vt.layout[rt[M]] = ue + (he - ve) / 2
                                    } else me === Y && (vt.layout[rt[M]] = ue + r(vt, M))
                                }
                            ue += he
                        }
                    }
                    var pe = !1,
                        xe = !1;
                    if (Et || (t.layout[ot[R]] = z(H(t, R, It + y(t, R)), Wt), (R === G || R === Z) && (pe = !0)), St || (t.layout[ot[M]] = z(H(t, M, Dt + Lt), Lt), (M === G || M === Z) && (xe = !0)), pe || xe)
                        for (ht = 0; N > ht; ++ht) vt = t.children[ht], pe && D(t, vt, R), xe && D(t, vt, M);
                    for (Tt = Ct; null !== Tt;) {
                        for (mt = 0; 2 > mt; mt++) pt = 0 !== mt ? q : U, !e(t.layout[ot[pt]]) && !k(Tt, pt) && C(Tt, it[pt]) && C(Tt, nt[pt]) && (Tt.layout[ot[pt]] = z(H(Tt, pt, t.layout[ot[pt]] - c(t, pt) - f(Tt, pt) - $(Tt, it[pt]) - $(Tt, nt[pt])), h(Tt, pt))), C(Tt, nt[pt]) && !C(Tt, it[pt]) && (Tt.layout[it[pt]] = t.layout[ot[pt]] - Tt.layout[ot[pt]] - $(Tt, nt[pt]));
                        vt = Tt, Tt = Tt.nextAbsoluteChild, vt.nextAbsoluteChild = null
                    }
                }

                function j(t, e, i, n) {
                    t.shouldUpdate = !0;
                    var r = t.style.direction || A,
                        o = !t.isDirty && t.lastLayout && t.lastLayout.requestedHeight === t.layout.height && t.lastLayout.requestedWidth === t.layout.width && t.lastLayout.parentMaxWidth === e && t.lastLayout.parentMaxHeight === i && t.lastLayout.direction === r;
                    o ? (t.layout.width = t.lastLayout.width, t.layout.height = t.lastLayout.height, t.layout.top = t.lastLayout.top, t.layout.left = t.lastLayout.left) : (t.lastLayout || (t.lastLayout = {}), t.lastLayout.requestedWidth = t.layout.width, t.lastLayout.requestedHeight = t.layout.height, t.lastLayout.parentMaxWidth = e, t.lastLayout.parentMaxHeight = i, t.lastLayout.direction = r, t.children.forEach(function(t) {
                        t.layout.width = void 0, t.layout.height = void 0, t.layout.top = 0, t.layout.left = 0
                    }), R(t, e, i, n), t.lastLayout.width = t.layout.width, t.lastLayout.height = t.layout.height, t.lastLayout.top = t.layout.top, t.lastLayout.left = t.layout.left)
                }
                var F, M = "inherit",
                    A = "ltr",
                    N = "rtl",
                    q = "row",
                    G = "row-reverse",
                    U = "column",
                    Z = "column-reverse",
                    O = "flex-start",
                    _ = "center",
                    J = "flex-end",
                    K = "space-between",
                    P = "space-around",
                    Q = "flex-start",
                    V = "center",
                    X = "flex-end",
                    Y = "stretch",
                    tt = "relative",
                    et = "absolute",
                    it = {
                        row: "left",
                        "row-reverse": "right",
                        column: "top",
                        "column-reverse": "bottom"
                    },
                    nt = {
                        row: "right",
                        "row-reverse": "left",
                        column: "bottom",
                        "column-reverse": "top"
                    },
                    rt = {
                        row: "left",
                        "row-reverse": "right",
                        column: "top",
                        "column-reverse": "bottom"
                    },
                    ot = {
                        row: "width",
                        "row-reverse": "width",
                        column: "height",
                        "column-reverse": "height"
                    };
                return {
                    layoutNodeImpl: R,
                    computeLayout: j,
                    fillNodes: t
                }
            }();
            return "object" == typeof exports && (module.exports = t),
                function(e) {
                    t.fillNodes(e), t.computeLayout(e)
                }
        }), !window.addEventListener && window.attachEvent && function() {
            Window.prototype.addEventListener = HTMLDocument.prototype.addEventListener = Element.prototype.addEventListener = function(t, e) {
                this.attachEvent("on" + t, e)
            }, Window.prototype.removeEventListener = HTMLDocument.prototype.removeEventListener = Element.prototype.removeEventListener = function(t, e) {
                this.detachEvent("on" + t, e)
            }
        }(), flexibility.detect = function() {
            var t = document.createElement("p");
            try {
                return t.style.display = "flex", "flex" === t.style.display
            } catch (e) {
                return !1
            }
        }, !flexibility.detect() && document.attachEvent && document.documentElement.currentStyle && document.attachEvent("onreadystatechange", function() {
            flexibility.onresize({
                target: document.documentElement
            })
        }), flexibility.init = function(t) {
            var e = t.onlayoutcomplete;
            return e || (e = t.onlayoutcomplete = {
                node: t,
                style: {},
                children: []
            }), e.style.display = t.currentStyle["-js-display"] || t.currentStyle.display, e
        };
    var t, e = 1e3,
        i = 15,
        n = document.documentElement,
        r = 0,
        o = 0;
    flexibility.onresize = function(l) {
        if (n.clientWidth !== r || n.clientHeight !== o) {
            r = n.clientWidth, o = n.clientHeight, clearTimeout(t), window.removeEventListener("resize", flexibility.onresize);
            var a = l.target && 1 === l.target.nodeType ? l.target : document.documentElement;
            flexibility.walk(a), t = setTimeout(function() {
                window.addEventListener("resize", flexibility.onresize)
            }, e / i)
        }
    };
    var l = {
        alignContent: {
            initial: "stretch",
            valid: /^(flex-start|flex-end|center|space-between|space-around|stretch)/
        },
        alignItems: {
            initial: "stretch",
            valid: /^(flex-start|flex-end|center|baseline|stretch)$/
        },
        boxSizing: {
            initial: "content-box",
            valid: /^(border-box|content-box)$/
        },
        flexDirection: {
            initial: "row",
            valid: /^(row|row-reverse|column|column-reverse)$/
        },
        flexWrap: {
            initial: "nowrap",
            valid: /^(nowrap|wrap|wrap-reverse)$/
        },
        justifyContent: {
            initial: "flex-start",
            valid: /^(flex-start|flex-end|center|space-between|space-around)$/
        }
    };
    flexibility.updateFlexContainerCache = function(t) {
        var e = t.style,
            i = t.node.currentStyle,
            n = t.node.style,
            r = {};
        (i["flex-flow"] || n["flex-flow"] || "").replace(/^(row|row-reverse|column|column-reverse)\s+(nowrap|wrap|wrap-reverse)$/i, function(t, e, i) {
            r.flexDirection = e, r.flexWrap = i
        });
        for (var o in l) {
            var a = o.replace(/[A-Z]/g, "-$&").toLowerCase(),
                d = l[o],
                s = i[a] || n[a];
            e[o] = d.valid.test(s) ? s : r[o] || d.initial
        }
    };
    var a = {
        alignSelf: {
            initial: "auto",
            valid: /^(auto|flex-start|flex-end|center|baseline|stretch)$/
        },
        boxSizing: {
            initial: "content-box",
            valid: /^(border-box|content-box)$/
        },
        flexBasis: {
            initial: "auto",
            valid: /^((?:[-+]?0|[-+]?[0-9]*\.?[0-9]+(?:%|ch|cm|em|ex|in|mm|pc|pt|px|rem|vh|vmax|vmin|vw))|auto|fill|max-content|min-content|fit-content|content)$/
        },
        flexGrow: {
            initial: 0,
            valid: /^\+?(0|[1-9][0-9]*)$/
        },
        flexShrink: {
            initial: 0,
            valid: /^\+?(0|[1-9][0-9]*)$/
        },
        order: {
            initial: 0,
            valid: /^([-+]?[0-9]+)$/
        }
    };
    flexibility.updateFlexItemCache = function(t) {
        var e = t.style,
            i = t.node.currentStyle,
            n = t.node.style,
            r = {};
        (i.flex || n.flex || "").replace(/^\+?(0|[1-9][0-9]*)/, function(t) {
            r.flexGrow = t
        });
        for (var o in a) {
            var l = o.replace(/[A-Z]/g, "-$&").toLowerCase(),
                d = a[o],
                s = i[l] || n[l];
            e[o] = d.valid.test(s) ? s : r[o] || d.initial, "number" == typeof d.initial && (e[o] = parseFloat(e[o]))
        }
    };
    var d = "border:0 solid;clip:rect(0 0 0 0);display:inline-block;font:0/0 serif;margin:0;max-height:none;max-width:none;min-height:0;min-width:0;overflow:hidden;padding:0;position:absolute;width:1em;",
        s = {
            medium: 4,
            none: 0,
            thick: 6,
            thin: 2
        },
        u = {
            borderBottomWidth: 0,
            borderLeftWidth: 0,
            borderRightWidth: 0,
            borderTopWidth: 0,
            height: 0,
            paddingBottom: 0,
            paddingLeft: 0,
            paddingRight: 0,
            paddingTop: 0,
            marginBottom: 0,
            marginLeft: 0,
            marginRight: 0,
            marginTop: 0,
            maxHeight: 0,
            maxWidth: 0,
            minHeight: 0,
            minWidth: 0,
            width: 0
        },
        y = /^([-+]?0|[-+]?[0-9]*\.?[0-9]+)/,
        c = 100;
    flexibility.updateLengthCache = function(t) {
        var e, i, n, r = t.node,
            o = t.style,
            l = r.parentNode,
            a = document.createElement("_"),
            f = a.runtimeStyle,
            h = r.currentStyle;
        f.cssText = d + "font-size:" + h.fontSize, l.insertBefore(a, r.nextSibling), o.fontSize = a.offsetWidth, f.fontSize = o.fontSize + "px";
        for (var m in u) {
            var v = h[m];
            y.test(v) || "auto" === v && !/(width|height)/i.test(m) ? /%$/.test(v) ? (/^(bottom|height|top)$/.test(m) ? (i || (i = l.offsetHeight), n = i) : (e || (e = l.offsetWidth), n = e), o[m] = parseFloat(v) * n / c) : (f.width = v, o[m] = a.offsetWidth) : /^border/.test(m) && v in s ? o[m] = s[v] : delete o[m]
        }
        l.removeChild(a), "none" === h.borderTopStyle && (o.borderTopWidth = 0), "none" === h.borderRightStyle && (o.borderRightWidth = 0), "none" === h.borderBottomStyle && (o.borderBottomWidth = 0), "none" === h.borderLeftStyle && (o.borderLeftWidth = 0), o.width || o.minWidth || (/flex/.test(o.display) ? o.width = r.offsetWidth : o.minWidth = r.offsetWidth), o.height || o.minHeight || /flex/.test(o.display) || (o.minHeight = r.offsetHeight)
    }, flexibility.walk = function(t) {
        var e = flexibility.init(t),
            i = e.style,
            n = i.display;
        if ("none" === n) return {};
        var r = n.match(/^(inline)?flex$/);
        if (r && (flexibility.updateFlexContainerCache(e), t.runtimeStyle.cssText = "display:" + (r[1] ? "inline-block" : "block"), e.children = []), Array.prototype.forEach.call(t.childNodes, function(t, n) {
                if (1 === t.nodeType) {
                    var o = flexibility.walk(t),
                        l = o.style;
                    o.index = n, r && (flexibility.updateFlexItemCache(o), "auto" === l.alignSelf && (l.alignSelf = i.alignItems), l.flex = l.flexGrow, t.runtimeStyle.cssText = "display:inline-block", e.children.push(o))
                }
            }), r) {
            e.children.forEach(function(t) {
                flexibility.updateLengthCache(t)
            }), e.children.sort(function(t, e) {
                return t.style.order - e.style.order || t.index - e.index
            }), /-reverse$/.test(i.flexDirection) && (e.children.reverse(), i.flexDirection = i.flexDirection.replace(/-reverse$/, ""), "flex-start" === i.justifyContent ? i.justifyContent = "flex-end" : "flex-end" === i.justifyContent && (i.justifyContent = "flex-start")), flexibility.updateLengthCache(e), delete e.lastLayout, delete e.layout;
            var o = i.borderTopWidth,
                l = i.borderBottomWidth;
            i.borderTopWidth = 0, i.borderBottomWidth = 0, i.borderLeftWidth = 0, "column" === i.flexDirection && (i.width -= i.borderRightWidth), flexibility.computeLayout(e), t.runtimeStyle.cssText = "box-sizing:border-box;display:block;position:relative;width:" + (e.layout.width + i.borderRightWidth) + "px;height:" + (e.layout.height + o + l) + "px";
            var a = [],
                d = 1,
                s = "column" === i.flexDirection ? "width" : "height";
            e.children.forEach(function(t) {
                a[t.lineIndex] = Math.max(a[t.lineIndex] || 0, t.layout[s]), d = Math.max(d, t.lineIndex + 1)
            }), e.children.forEach(function(t) {
                var e = t.layout;
                "stretch" === t.style.alignSelf && (e[s] = a[t.lineIndex]), t.node.runtimeStyle.cssText = "box-sizing:border-box;display:block;position:absolute;margin:0;width:" + e.width + "px;height:" + e.height + "px;top:" + e.top + "px;left:" + e.left + "px"
            })
        }
        return e
    }
}();

/**
 * File navigation.js
 *
 * Handles toggling the navigation menu for small screens and enables tab
 * support for dropdown menus.
 *
 * @package Kemet
 */

var isIE = false;
var isEdge = false;

/**
 * Get all of an element's parent elements up the DOM tree
 *
 * @param  {Node}   elem     The element.
 * @param  {String} selector Selector to match against [optional].
 * @return {Array}           The parent elements.
 */
var getParents = function ( elem, selector ) {

	// Element.matches() polyfill.
	if ( ! Element.prototype.matches) {
		Element.prototype.matches =
			Element.prototype.matchesSelector ||
			Element.prototype.mozMatchesSelector ||
			Element.prototype.msMatchesSelector ||
			Element.prototype.oMatchesSelector ||
			Element.prototype.webkitMatchesSelector ||
			function(s) {
				var matches = (this.document || this.ownerDocument).querySelectorAll( s ),
					i = matches.length;
				while (--i >= 0 && matches.item( i ) !== this) {}
				return i > -1;
			};
	}

	// Setup parents array.
	var parents = [];

	// Get matching parent elements.
	for ( ; elem && elem !== document; elem = elem.parentNode ) {

		// Add matching parents to array.
		if ( selector ) {
			if ( elem.matches( selector ) ) {
				parents.push( elem );
			}
		} else {
			parents.push( elem );
		}
	}
	return parents;
};

/* . */
/**
 * Toggle Class funtion
 *
 * @param  {Node}   elem     The element.
 * @param  {String} selector Selector to match against [optional].
 * @return {Array}           The parent elements.
 */
var toggleClass = function ( el, className ) {
	if ( el.classList.contains( className ) ) {
		el.classList.remove( className );
	} else {
		el.classList.add( className );
	}
};

// CustomEvent() constructor functionality in Internet Explorer 9 and higher.
(function () {

	
    // Internet Explorer 6-11
    isIE = /*@cc_on!@*/false || !!document.documentMode;

    // Edge 20+
    isEdge = !isIE && !!window.StyleMedia;


	if ( typeof window.CustomEvent === "function" ) return false;

	function CustomEvent ( event, params ) {
		params = params || { bubbles: false, cancelable: false, detail: undefined };
		var evt = document.createEvent( 'CustomEvent' );
		evt.initCustomEvent( event, params.bubbles, params.cancelable, params.detail );
		return evt;
	}

	CustomEvent.prototype = window.Event.prototype;

	window.CustomEvent = CustomEvent;

})();

( function() {

	KemetNavigationMenu = function( parentList ) {

		for (var i = 0; i < parentList.length; i++) {

			if ( null != parentList[i].querySelector( '.sub-menu, .children' ) ) {

				// Insert Toggle Button.
				var  toggleButton = document.createElement("BUTTON");        // Create a <button> element
					toggleButton.setAttribute("role", "button");
					toggleButton.setAttribute("class", "kmt-menu-toggle");
					toggleButton.setAttribute("aria-expanded", "false");
					toggleButton.innerHTML="<span class='screen-reader-text'>Menu Toggle</span>";
				parentList[i].insertBefore( toggleButton, parentList[i].childNodes[1] );

				var menuLeft         = parentList[i].getBoundingClientRect().left,
					windowWidth      = window.innerWidth,
					menuFromLeft     = (parseInt( windowWidth ) - parseInt( menuLeft ) ),
					menuGoingOutside = false;

				if( menuFromLeft < 500 ) {
					menuGoingOutside = true;
				}

				// Submenu items goes outside?
				if( menuGoingOutside ) {
					parentList[i].classList.add( 'kmt-left-align-sub-menu' );

					var all_submenu_parents = parentList[i].querySelectorAll( '.menu-item-has-children, .page_item_has_children' );
					for (var k = 0; k < all_submenu_parents.length; k++) {
						all_submenu_parents[k].classList.add( 'kmt-left-align-sub-menu' );
					}
				}

				// Submenu Container goes to outside?
				if( menuFromLeft < 240 ) {
					parentList[i].classList.add( 'kmt-sub-menu-goes-outside' );
				}

			};
		};
	};

	KemetToggleMenu = function( kemet_menu_toggle ) {
		
		/* Submenu button click */
		for (var i = 0; i < kemet_menu_toggle.length; i++) {

			kemet_menu_toggle[i].addEventListener( 'click', function ( event ) {
				event.preventDefault();

				var parent_li = this.parentNode;

				var parent_li_child = parent_li.querySelectorAll( '.menu-item-has-children, .page_item_has_children' );
				for (var j = 0; j < parent_li_child.length; j++) {

					parent_li_child[j].classList.remove( 'kmt-submenu-expanded' );
					var parent_li_child_sub_menu = parent_li_child[j].querySelector( '.sub-menu, .children' );		
					parent_li_child_sub_menu.style.display = 'none';
				};

				var parent_li_sibling = parent_li.parentNode.querySelectorAll( '.menu-item-has-children, .page_item_has_children' );
				for (var j = 0; j < parent_li_sibling.length; j++) {

					if ( parent_li_sibling[j] != parent_li ) {

						parent_li_sibling[j].classList.remove( 'kmt-submenu-expanded' );
						var all_sub_menu = parent_li_sibling[j].querySelectorAll( '.sub-menu, .children' );
						for (var k = 0; k < all_sub_menu.length; k++) {		
							all_sub_menu[k].style.display = 'none';		
						};
					}
				};

				if ( parent_li.classList.contains( 'menu-item-has-children' ) || parent_li.classList.contains( 'page_item_has_children' ) ) {
					toggleClass( parent_li, 'kmt-submenu-expanded' );
					if ( parent_li.classList.contains( 'kmt-submenu-expanded' ) ) {
						parent_li.querySelector( '.sub-menu, .children' ).style.display = 'block';
					} else {
						parent_li.querySelector( '.sub-menu, .children' ).style.display = 'none';
					}
				}
			}, false);
		};
	};

	var __main_header_all 	= document.querySelectorAll( '.main-navigation' );
	var menu_toggle_all 	= document.querySelectorAll( '.main-header-menu-toggle' );

	if ( menu_toggle_all.length > 0 ) {

		for (var i = 0; i < menu_toggle_all.length; i++) {
			
			menu_toggle_all[i].setAttribute('data-index', i);

			menu_toggle_all[i].addEventListener( 'click', function( event ) {
		    	event.preventDefault();

		    	var event_index = this.getAttribute( 'data-index' );

		    	if ( 'undefined' === typeof __main_header_all[event_index] ) {

		    		return false;
		    	}

		    	var menuHasChildren = __main_header_all[event_index].querySelectorAll( '.menu-item-has-children, .page_item_has_children' );
				for ( var i = 0; i < menuHasChildren.length; i++ ) {
					menuHasChildren[i].classList.remove( 'kmt-submenu-expanded' );
					var menuHasChildrenSubMenu = menuHasChildren[i].querySelectorAll( '.sub-menu, .children' );		
					for (var j = 0; j < menuHasChildrenSubMenu.length; j++) {		
						menuHasChildrenSubMenu[j].style.display = 'none';		
					};
				}

				var rel = this.getAttribute( 'rel' ) || '';

				switch ( rel ) {
					case 'main-menu':
							toggleClass( __main_header_all[event_index], 'toggle-on' );
							toggleClass( menu_toggle_all[event_index], 'toggled' );
							if ( __main_header_all[event_index].classList.contains( 'toggle-on' ) ) {		
								__main_header_all[event_index].style.display = 'block';		
							} else {		
								__main_header_all[event_index].style.display = '';		
							}
						break;
				}
		    }, false);
			
			if ( 'undefined' !== typeof __main_header_all[i] ) {
				var parentList = __main_header_all[i].querySelectorAll( 'ul.main-header-menu li' );
				KemetNavigationMenu( parentList );
			 	
			 	var kemet_menu_toggle = __main_header_all[i].querySelectorAll( 'ul.main-header-menu .kmt-menu-toggle' );
				KemetToggleMenu( kemet_menu_toggle );
			}
		};
	}
	
	document.body.addEventListener("kemet-header-responsive-enabled", function() {

		if ( __main_header_all.length > 0 ) {

			for (var i = 0; i < __main_header_all.length; i++) {
				if( null != __main_header_all[i] ) {
					__main_header_all[i].classList.remove( 'toggle-on' );
					__main_header_all[i].style.display = '';
				}

				var sub_menu = __main_header_all[i].getElementsByClassName( 'sub-menu' );
				for ( var j = 0; j < sub_menu.length; j++ ) {
					sub_menu[j].style.display = '';
				}
				var child_menu = __main_header_all[i].getElementsByClassName( 'children' );
				for ( var k = 0; k < child_menu.length; k++ ) {
					child_menu[k].style.display = '';
				}

				var searchIcons = __main_header_all[i].getElementsByClassName( 'kmt-search-menu-icon' );
				for ( var l = 0; l < searchIcons.length; l++ ) {
					searchIcons[l].classList.remove( 'kmt-dropdown-active' );
					searchIcons[l].style.display = '';
				}
			}
		}
	}, false);
	
	/* Add break point Class and related trigger */
	var updateHeaderBreakPoint = function () {

		var break_point = kemet.break_point,
			headerWrap = document.querySelectorAll( '.main-header-bar-wrap' );

		if ( headerWrap.length > 0  ) {
			for ( var i = 0; i < headerWrap.length; i++ ) {

				if ( headerWrap[i].tagName == 'DIV' && headerWrap[i].classList.contains( 'main-header-bar-wrap' ) ) {

					var header_content_bp = window.getComputedStyle( headerWrap[i], '::before' ).getPropertyValue('content');

					// Edge/Explorer header break point.
					if( isEdge || isIE || header_content_bp === 'normal' ) {
						if( window.innerWidth <= break_point ) {
							header_content_bp = break_point;
						}
					}

					header_content_bp = header_content_bp.replace( /[^0-9]/g, '' );
					header_content_bp = parseInt( header_content_bp );

					// `kmt-header-break-point` class will use for Responsive Style of Header.
					if ( header_content_bp != break_point ) {
						//remove menu toggled class.
						if ( null != menu_toggle_all[i] ) {
							menu_toggle_all[i].classList.remove( 'toggled' );
						}
						document.body.classList.remove( "kmt-header-break-point" );
						var responsive_enabled = new CustomEvent( "kemet-header-responsive-enabled" );
						document.body.dispatchEvent( responsive_enabled );

					} else {

						document.body.classList.add( "kmt-header-break-point" );
						var responsive_disabled = new CustomEvent( "kemet-header-responsive-disabled" );
						document.body.dispatchEvent( responsive_disabled );
					}
				}
			}
		}
	}

	window.addEventListener("resize", function() {
		updateHeaderBreakPoint();
	});

	updateHeaderBreakPoint();

	var get_browser = function () {
	    var ua = navigator.userAgent,tem,M = ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || []; 
	    if(/trident/i.test(M[1])) {
	        tem = /\brv[ :]+(\d+)/g.exec(ua) || []; 
	        return;
	    }   
	    if( 'Chrome'  === M[1] ) {
	        tem = ua.match(/\bOPR|Edge\/(\d+)/)
	        if(tem != null)   { 
	        	return;
	        	}
	        }   
	    M = M[2]? [M[1], M[2]]: [navigator.appName, navigator.appVersion, '-?'];
	    if((tem = ua.match(/version\/(\d+)/i)) != null) {
	    	M.splice(1,1,tem[1]);
	    }

	    bodyElement = document.body;
	    if( 'Safari' === M[0] && M[1] < 11 ) {
		   bodyElement.classList.add( "kmt-safari-browser-less-than-11" );
	    }
	}

	get_browser();
	
	/* Search Script */
	var SearchIcons = document.getElementsByClassName( 'kemet-search-icon' );
	for (var i = 0; i < SearchIcons.length; i++) {

		SearchIcons[i].onclick = function(event) {
			if ( this.classList.contains( 'slide-search' ) ) {
				event.preventDefault();
				var sibling = this.parentNode.parentNode.querySelector( '.kmt-search-menu-icon' );
				if ( ! sibling.classList.contains( 'kmt-dropdown-active' ) ) {
					sibling.classList.add( 'kmt-dropdown-active' );
					sibling.querySelector( '.search-field' ).setAttribute('autocomplete','off');
					setTimeout(function() {
						sibling.querySelector( '.search-field' ).focus();
					},200);
				} else {
					sibling.classList.remove( 'kmt-dropdown-active' );
				}
			}
		}
	};

	/* Hide Dropdown on body click*/
	document.body.onclick = function( event ) {
		if ( ! this.classList.contains( 'kmt-header-break-point' ) ) {
			if ( ! event.target.classList.contains( 'kmt-search-menu-icon' ) && getParents( event.target, '.kmt-search-menu-icon' ).length === 0 && getParents( event.target, '.kmt-search-icon' ).length === 0  ) {

				var dropdownSearchWrap = document.getElementsByClassName( 'kmt-search-menu-icon' );

				for (var i = 0; i < dropdownSearchWrap.length; i++) {
					dropdownSearchWrap[i].classList.remove( 'kmt-dropdown-active' );
				};
			}
		}
	}
	/**
	 * Navigation Keyboard Navigation.
	 */
	var container, button, menu, links, subMenus, i, len;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
	};

	// Get all the link elements within the menu.
	links    = menu.getElementsByTagName( 'a' );
	subMenus = menu.getElementsByTagName( 'ul' );


	// Set menu items with submenus to aria-haspopup="true".
	for ( i = 0, len = subMenus.length; i < len; i++ ) {
		subMenus[i].parentNode.setAttribute( 'aria-haspopup', 'true' );
	}

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}

	/**
	 * Toggles `focus` class to allow submenu access on tablets.
	 */
	( function( container ) {
		var touchStartFn, i,
			parentLink = container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

		if ( 'ontouchstart' in window ) {
			touchStartFn = function( e ) {
				var menuItem = this.parentNode, i;

				if ( ! menuItem.classList.contains( 'focus' ) ) {
					e.preventDefault();
					for ( i = 0; i < menuItem.parentNode.children.length; ++i ) {
						if ( menuItem === menuItem.parentNode.children[i] ) {
							continue;
						}
						menuItem.parentNode.children[i].classList.remove( 'focus' );
					}
					menuItem.classList.add( 'focus' );
				} else {
					menuItem.classList.remove( 'focus' );
				}
			};

			for ( i = 0; i < parentLink.length; ++i ) {
				parentLink[i].addEventListener( 'touchstart', touchStartFn, false );
			}
		}
	}( container ) );

} )();


/**
 * File skip-link-focus-fix.js
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://github.com/Automattic/_s/pull/136
 *
 * @package Kemet
 */

( function() {
	var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
	    is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' ) > -1,
	    is_ie     = navigator.userAgent.toLowerCase().indexOf( 'msie' ) > -1;

	if ( ( is_webkit || is_opera || is_ie ) && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var id = location.hash.substring( 1 ),
				element;

			if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
				return;
			}

			element = document.getElementById( id );

			if ( element ) {
				if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
					element.tabIndex = -1;
				}

				element.focus();
			}
		}, false );
	}
})();

/*!
 * Isotope PACKAGED v3.0.6
 *
 * Licensed GPLv3 for open source use
 * or Isotope Commercial License for commercial use
 *
 * https://isotope.metafizzy.co
 * Copyright 2010-2018 Metafizzy
 */

!function(t,e){"function"==typeof define&&define.amd?define("jquery-bridget/jquery-bridget",["jquery"],function(i){return e(t,i)}):"object"==typeof module&&module.exports?module.exports=e(t,require("jquery")):t.jQueryBridget=e(t,t.jQuery)}(window,function(t,e){"use strict";function i(i,s,a){function u(t,e,o){var n,s="$()."+i+'("'+e+'")';return t.each(function(t,u){var h=a.data(u,i);if(!h)return void r(i+" not initialized. Cannot call methods, i.e. "+s);var d=h[e];if(!d||"_"==e.charAt(0))return void r(s+" is not a valid method");var l=d.apply(h,o);n=void 0===n?l:n}),void 0!==n?n:t}function h(t,e){t.each(function(t,o){var n=a.data(o,i);n?(n.option(e),n._init()):(n=new s(o,e),a.data(o,i,n))})}a=a||e||t.jQuery,a&&(s.prototype.option||(s.prototype.option=function(t){a.isPlainObject(t)&&(this.options=a.extend(!0,this.options,t))}),a.fn[i]=function(t){if("string"==typeof t){var e=n.call(arguments,1);return u(this,t,e)}return h(this,t),this},o(a))}function o(t){!t||t&&t.bridget||(t.bridget=i)}var n=Array.prototype.slice,s=t.console,r="undefined"==typeof s?function(){}:function(t){s.error(t)};return o(e||t.jQuery),i}),function(t,e){"function"==typeof define&&define.amd?define("ev-emitter/ev-emitter",e):"object"==typeof module&&module.exports?module.exports=e():t.EvEmitter=e()}("undefined"!=typeof window?window:this,function(){function t(){}var e=t.prototype;return e.on=function(t,e){if(t&&e){var i=this._events=this._events||{},o=i[t]=i[t]||[];return o.indexOf(e)==-1&&o.push(e),this}},e.once=function(t,e){if(t&&e){this.on(t,e);var i=this._onceEvents=this._onceEvents||{},o=i[t]=i[t]||{};return o[e]=!0,this}},e.off=function(t,e){var i=this._events&&this._events[t];if(i&&i.length){var o=i.indexOf(e);return o!=-1&&i.splice(o,1),this}},e.emitEvent=function(t,e){var i=this._events&&this._events[t];if(i&&i.length){i=i.slice(0),e=e||[];for(var o=this._onceEvents&&this._onceEvents[t],n=0;n<i.length;n++){var s=i[n],r=o&&o[s];r&&(this.off(t,s),delete o[s]),s.apply(this,e)}return this}},e.allOff=function(){delete this._events,delete this._onceEvents},t}),function(t,e){"function"==typeof define&&define.amd?define("get-size/get-size",e):"object"==typeof module&&module.exports?module.exports=e():t.getSize=e()}(window,function(){"use strict";function t(t){var e=parseFloat(t),i=t.indexOf("%")==-1&&!isNaN(e);return i&&e}function e(){}function i(){for(var t={width:0,height:0,innerWidth:0,innerHeight:0,outerWidth:0,outerHeight:0},e=0;e<h;e++){var i=u[e];t[i]=0}return t}function o(t){var e=getComputedStyle(t);return e||a("Style returned "+e+". Are you running this code in a hidden iframe on Firefox? See https://bit.ly/getsizebug1"),e}function n(){if(!d){d=!0;var e=document.createElement("div");e.style.width="200px",e.style.padding="1px 2px 3px 4px",e.style.borderStyle="solid",e.style.borderWidth="1px 2px 3px 4px",e.style.boxSizing="border-box";var i=document.body||document.documentElement;i.appendChild(e);var n=o(e);r=200==Math.round(t(n.width)),s.isBoxSizeOuter=r,i.removeChild(e)}}function s(e){if(n(),"string"==typeof e&&(e=document.querySelector(e)),e&&"object"==typeof e&&e.nodeType){var s=o(e);if("none"==s.display)return i();var a={};a.width=e.offsetWidth,a.height=e.offsetHeight;for(var d=a.isBorderBox="border-box"==s.boxSizing,l=0;l<h;l++){var f=u[l],c=s[f],m=parseFloat(c);a[f]=isNaN(m)?0:m}var p=a.paddingLeft+a.paddingRight,y=a.paddingTop+a.paddingBottom,g=a.marginLeft+a.marginRight,v=a.marginTop+a.marginBottom,_=a.borderLeftWidth+a.borderRightWidth,z=a.borderTopWidth+a.borderBottomWidth,I=d&&r,x=t(s.width);x!==!1&&(a.width=x+(I?0:p+_));var S=t(s.height);return S!==!1&&(a.height=S+(I?0:y+z)),a.innerWidth=a.width-(p+_),a.innerHeight=a.height-(y+z),a.outerWidth=a.width+g,a.outerHeight=a.height+v,a}}var r,a="undefined"==typeof console?e:function(t){console.error(t)},u=["paddingLeft","paddingRight","paddingTop","paddingBottom","marginLeft","marginRight","marginTop","marginBottom","borderLeftWidth","borderRightWidth","borderTopWidth","borderBottomWidth"],h=u.length,d=!1;return s}),function(t,e){"use strict";"function"==typeof define&&define.amd?define("desandro-matches-selector/matches-selector",e):"object"==typeof module&&module.exports?module.exports=e():t.matchesSelector=e()}(window,function(){"use strict";var t=function(){var t=window.Element.prototype;if(t.matches)return"matches";if(t.matchesSelector)return"matchesSelector";for(var e=["webkit","moz","ms","o"],i=0;i<e.length;i++){var o=e[i],n=o+"MatchesSelector";if(t[n])return n}}();return function(e,i){return e[t](i)}}),function(t,e){"function"==typeof define&&define.amd?define("fizzy-ui-utils/utils",["desandro-matches-selector/matches-selector"],function(i){return e(t,i)}):"object"==typeof module&&module.exports?module.exports=e(t,require("desandro-matches-selector")):t.fizzyUIUtils=e(t,t.matchesSelector)}(window,function(t,e){var i={};i.extend=function(t,e){for(var i in e)t[i]=e[i];return t},i.modulo=function(t,e){return(t%e+e)%e};var o=Array.prototype.slice;i.makeArray=function(t){if(Array.isArray(t))return t;if(null===t||void 0===t)return[];var e="object"==typeof t&&"number"==typeof t.length;return e?o.call(t):[t]},i.removeFrom=function(t,e){var i=t.indexOf(e);i!=-1&&t.splice(i,1)},i.getParent=function(t,i){for(;t.parentNode&&t!=document.body;)if(t=t.parentNode,e(t,i))return t},i.getQueryElement=function(t){return"string"==typeof t?document.querySelector(t):t},i.handleEvent=function(t){var e="on"+t.type;this[e]&&this[e](t)},i.filterFindElements=function(t,o){t=i.makeArray(t);var n=[];return t.forEach(function(t){if(t instanceof HTMLElement){if(!o)return void n.push(t);e(t,o)&&n.push(t);for(var i=t.querySelectorAll(o),s=0;s<i.length;s++)n.push(i[s])}}),n},i.debounceMethod=function(t,e,i){i=i||100;var o=t.prototype[e],n=e+"Timeout";t.prototype[e]=function(){var t=this[n];clearTimeout(t);var e=arguments,s=this;this[n]=setTimeout(function(){o.apply(s,e),delete s[n]},i)}},i.docReady=function(t){var e=document.readyState;"complete"==e||"interactive"==e?setTimeout(t):document.addEventListener("DOMContentLoaded",t)},i.toDashed=function(t){return t.replace(/(.)([A-Z])/g,function(t,e,i){return e+"-"+i}).toLowerCase()};var n=t.console;return i.htmlInit=function(e,o){i.docReady(function(){var s=i.toDashed(o),r="data-"+s,a=document.querySelectorAll("["+r+"]"),u=document.querySelectorAll(".js-"+s),h=i.makeArray(a).concat(i.makeArray(u)),d=r+"-options",l=t.jQuery;h.forEach(function(t){var i,s=t.getAttribute(r)||t.getAttribute(d);try{i=s&&JSON.parse(s)}catch(a){return void(n&&n.error("Error parsing "+r+" on "+t.className+": "+a))}var u=new e(t,i);l&&l.data(t,o,u)})})},i}),function(t,e){"function"==typeof define&&define.amd?define("outlayer/item",["ev-emitter/ev-emitter","get-size/get-size"],e):"object"==typeof module&&module.exports?module.exports=e(require("ev-emitter"),require("get-size")):(t.Outlayer={},t.Outlayer.Item=e(t.EvEmitter,t.getSize))}(window,function(t,e){"use strict";function i(t){for(var e in t)return!1;return e=null,!0}function o(t,e){t&&(this.element=t,this.layout=e,this.position={x:0,y:0},this._create())}function n(t){return t.replace(/([A-Z])/g,function(t){return"-"+t.toLowerCase()})}var s=document.documentElement.style,r="string"==typeof s.transition?"transition":"WebkitTransition",a="string"==typeof s.transform?"transform":"WebkitTransform",u={WebkitTransition:"webkitTransitionEnd",transition:"transitionend"}[r],h={transform:a,transition:r,transitionDuration:r+"Duration",transitionProperty:r+"Property",transitionDelay:r+"Delay"},d=o.prototype=Object.create(t.prototype);d.constructor=o,d._create=function(){this._transn={ingProperties:{},clean:{},onEnd:{}},this.css({position:"absolute"})},d.handleEvent=function(t){var e="on"+t.type;this[e]&&this[e](t)},d.getSize=function(){this.size=e(this.element)},d.css=function(t){var e=this.element.style;for(var i in t){var o=h[i]||i;e[o]=t[i]}},d.getPosition=function(){var t=getComputedStyle(this.element),e=this.layout._getOption("originLeft"),i=this.layout._getOption("originTop"),o=t[e?"left":"right"],n=t[i?"top":"bottom"],s=parseFloat(o),r=parseFloat(n),a=this.layout.size;o.indexOf("%")!=-1&&(s=s/100*a.width),n.indexOf("%")!=-1&&(r=r/100*a.height),s=isNaN(s)?0:s,r=isNaN(r)?0:r,s-=e?a.paddingLeft:a.paddingRight,r-=i?a.paddingTop:a.paddingBottom,this.position.x=s,this.position.y=r},d.layoutPosition=function(){var t=this.layout.size,e={},i=this.layout._getOption("originLeft"),o=this.layout._getOption("originTop"),n=i?"paddingLeft":"paddingRight",s=i?"left":"right",r=i?"right":"left",a=this.position.x+t[n];e[s]=this.getXValue(a),e[r]="";var u=o?"paddingTop":"paddingBottom",h=o?"top":"bottom",d=o?"bottom":"top",l=this.position.y+t[u];e[h]=this.getYValue(l),e[d]="",this.css(e),this.emitEvent("layout",[this])},d.getXValue=function(t){var e=this.layout._getOption("horizontal");return this.layout.options.percentPosition&&!e?t/this.layout.size.width*100+"%":t+"px"},d.getYValue=function(t){var e=this.layout._getOption("horizontal");return this.layout.options.percentPosition&&e?t/this.layout.size.height*100+"%":t+"px"},d._transitionTo=function(t,e){this.getPosition();var i=this.position.x,o=this.position.y,n=t==this.position.x&&e==this.position.y;if(this.setPosition(t,e),n&&!this.isTransitioning)return void this.layoutPosition();var s=t-i,r=e-o,a={};a.transform=this.getTranslate(s,r),this.transition({to:a,onTransitionEnd:{transform:this.layoutPosition},isCleaning:!0})},d.getTranslate=function(t,e){var i=this.layout._getOption("originLeft"),o=this.layout._getOption("originTop");return t=i?t:-t,e=o?e:-e,"translate3d("+t+"px, "+e+"px, 0)"},d.goTo=function(t,e){this.setPosition(t,e),this.layoutPosition()},d.moveTo=d._transitionTo,d.setPosition=function(t,e){this.position.x=parseFloat(t),this.position.y=parseFloat(e)},d._nonTransition=function(t){this.css(t.to),t.isCleaning&&this._removeStyles(t.to);for(var e in t.onTransitionEnd)t.onTransitionEnd[e].call(this)},d.transition=function(t){if(!parseFloat(this.layout.options.transitionDuration))return void this._nonTransition(t);var e=this._transn;for(var i in t.onTransitionEnd)e.onEnd[i]=t.onTransitionEnd[i];for(i in t.to)e.ingProperties[i]=!0,t.isCleaning&&(e.clean[i]=!0);if(t.from){this.css(t.from);var o=this.element.offsetHeight;o=null}this.enableTransition(t.to),this.css(t.to),this.isTransitioning=!0};var l="opacity,"+n(a);d.enableTransition=function(){if(!this.isTransitioning){var t=this.layout.options.transitionDuration;t="number"==typeof t?t+"ms":t,this.css({transitionProperty:l,transitionDuration:t,transitionDelay:this.staggerDelay||0}),this.element.addEventListener(u,this,!1)}},d.onwebkitTransitionEnd=function(t){this.ontransitionend(t)},d.onotransitionend=function(t){this.ontransitionend(t)};var f={"-webkit-transform":"transform"};d.ontransitionend=function(t){if(t.target===this.element){var e=this._transn,o=f[t.propertyName]||t.propertyName;if(delete e.ingProperties[o],i(e.ingProperties)&&this.disableTransition(),o in e.clean&&(this.element.style[t.propertyName]="",delete e.clean[o]),o in e.onEnd){var n=e.onEnd[o];n.call(this),delete e.onEnd[o]}this.emitEvent("transitionEnd",[this])}},d.disableTransition=function(){this.removeTransitionStyles(),this.element.removeEventListener(u,this,!1),this.isTransitioning=!1},d._removeStyles=function(t){var e={};for(var i in t)e[i]="";this.css(e)};var c={transitionProperty:"",transitionDuration:"",transitionDelay:""};return d.removeTransitionStyles=function(){this.css(c)},d.stagger=function(t){t=isNaN(t)?0:t,this.staggerDelay=t+"ms"},d.removeElem=function(){this.element.parentNode.removeChild(this.element),this.css({display:""}),this.emitEvent("remove",[this])},d.remove=function(){return r&&parseFloat(this.layout.options.transitionDuration)?(this.once("transitionEnd",function(){this.removeElem()}),void this.hide()):void this.removeElem()},d.reveal=function(){delete this.isHidden,this.css({display:""});var t=this.layout.options,e={},i=this.getHideRevealTransitionEndProperty("visibleStyle");e[i]=this.onRevealTransitionEnd,this.transition({from:t.hiddenStyle,to:t.visibleStyle,isCleaning:!0,onTransitionEnd:e})},d.onRevealTransitionEnd=function(){this.isHidden||this.emitEvent("reveal")},d.getHideRevealTransitionEndProperty=function(t){var e=this.layout.options[t];if(e.opacity)return"opacity";for(var i in e)return i},d.hide=function(){this.isHidden=!0,this.css({display:""});var t=this.layout.options,e={},i=this.getHideRevealTransitionEndProperty("hiddenStyle");e[i]=this.onHideTransitionEnd,this.transition({from:t.visibleStyle,to:t.hiddenStyle,isCleaning:!0,onTransitionEnd:e})},d.onHideTransitionEnd=function(){this.isHidden&&(this.css({display:"none"}),this.emitEvent("hide"))},d.destroy=function(){this.css({position:"",left:"",right:"",top:"",bottom:"",transition:"",transform:""})},o}),function(t,e){"use strict";"function"==typeof define&&define.amd?define("outlayer/outlayer",["ev-emitter/ev-emitter","get-size/get-size","fizzy-ui-utils/utils","./item"],function(i,o,n,s){return e(t,i,o,n,s)}):"object"==typeof module&&module.exports?module.exports=e(t,require("ev-emitter"),require("get-size"),require("fizzy-ui-utils"),require("./item")):t.Outlayer=e(t,t.EvEmitter,t.getSize,t.fizzyUIUtils,t.Outlayer.Item)}(window,function(t,e,i,o,n){"use strict";function s(t,e){var i=o.getQueryElement(t);if(!i)return void(u&&u.error("Bad element for "+this.constructor.namespace+": "+(i||t)));this.element=i,h&&(this.$element=h(this.element)),this.options=o.extend({},this.constructor.defaults),this.option(e);var n=++l;this.element.outlayerGUID=n,f[n]=this,this._create();var s=this._getOption("initLayout");s&&this.layout()}function r(t){function e(){t.apply(this,arguments)}return e.prototype=Object.create(t.prototype),e.prototype.constructor=e,e}function a(t){if("number"==typeof t)return t;var e=t.match(/(^\d*\.?\d*)(\w*)/),i=e&&e[1],o=e&&e[2];if(!i.length)return 0;i=parseFloat(i);var n=m[o]||1;return i*n}var u=t.console,h=t.jQuery,d=function(){},l=0,f={};s.namespace="outlayer",s.Item=n,s.defaults={containerStyle:{position:"relative"},initLayout:!0,originLeft:!0,originTop:!0,resize:!0,resizeContainer:!0,transitionDuration:"0.4s",hiddenStyle:{opacity:0,transform:"scale(0.001)"},visibleStyle:{opacity:1,transform:"scale(1)"}};var c=s.prototype;o.extend(c,e.prototype),c.option=function(t){o.extend(this.options,t)},c._getOption=function(t){var e=this.constructor.compatOptions[t];return e&&void 0!==this.options[e]?this.options[e]:this.options[t]},s.compatOptions={initLayout:"isInitLayout",horizontal:"isHorizontal",layoutInstant:"isLayoutInstant",originLeft:"isOriginLeft",originTop:"isOriginTop",resize:"isResizeBound",resizeContainer:"isResizingContainer"},c._create=function(){this.reloadItems(),this.stamps=[],this.stamp(this.options.stamp),o.extend(this.element.style,this.options.containerStyle);var t=this._getOption("resize");t&&this.bindResize()},c.reloadItems=function(){this.items=this._itemize(this.element.children)},c._itemize=function(t){for(var e=this._filterFindItemElements(t),i=this.constructor.Item,o=[],n=0;n<e.length;n++){var s=e[n],r=new i(s,this);o.push(r)}return o},c._filterFindItemElements=function(t){return o.filterFindElements(t,this.options.itemSelector)},c.getItemElements=function(){return this.items.map(function(t){return t.element})},c.layout=function(){this._resetLayout(),this._manageStamps();var t=this._getOption("layoutInstant"),e=void 0!==t?t:!this._isLayoutInited;this.layoutItems(this.items,e),this._isLayoutInited=!0},c._init=c.layout,c._resetLayout=function(){this.getSize()},c.getSize=function(){this.size=i(this.element)},c._getMeasurement=function(t,e){var o,n=this.options[t];n?("string"==typeof n?o=this.element.querySelector(n):n instanceof HTMLElement&&(o=n),this[t]=o?i(o)[e]:n):this[t]=0},c.layoutItems=function(t,e){t=this._getItemsForLayout(t),this._layoutItems(t,e),this._postLayout()},c._getItemsForLayout=function(t){return t.filter(function(t){return!t.isIgnored})},c._layoutItems=function(t,e){if(this._emitCompleteOnItems("layout",t),t&&t.length){var i=[];t.forEach(function(t){var o=this._getItemLayoutPosition(t);o.item=t,o.isInstant=e||t.isLayoutInstant,i.push(o)},this),this._processLayoutQueue(i)}},c._getItemLayoutPosition=function(){return{x:0,y:0}},c._processLayoutQueue=function(t){this.updateStagger(),t.forEach(function(t,e){this._positionItem(t.item,t.x,t.y,t.isInstant,e)},this)},c.updateStagger=function(){var t=this.options.stagger;return null===t||void 0===t?void(this.stagger=0):(this.stagger=a(t),this.stagger)},c._positionItem=function(t,e,i,o,n){o?t.goTo(e,i):(t.stagger(n*this.stagger),t.moveTo(e,i))},c._postLayout=function(){this.resizeContainer()},c.resizeContainer=function(){var t=this._getOption("resizeContainer");if(t){var e=this._getContainerSize();e&&(this._setContainerMeasure(e.width,!0),this._setContainerMeasure(e.height,!1))}},c._getContainerSize=d,c._setContainerMeasure=function(t,e){if(void 0!==t){var i=this.size;i.isBorderBox&&(t+=e?i.paddingLeft+i.paddingRight+i.borderLeftWidth+i.borderRightWidth:i.paddingBottom+i.paddingTop+i.borderTopWidth+i.borderBottomWidth),t=Math.max(t,0),this.element.style[e?"width":"height"]=t+"px"}},c._emitCompleteOnItems=function(t,e){function i(){n.dispatchEvent(t+"Complete",null,[e])}function o(){r++,r==s&&i()}var n=this,s=e.length;if(!e||!s)return void i();var r=0;e.forEach(function(e){e.once(t,o)})},c.dispatchEvent=function(t,e,i){var o=e?[e].concat(i):i;if(this.emitEvent(t,o),h)if(this.$element=this.$element||h(this.element),e){var n=h.Event(e);n.type=t,this.$element.trigger(n,i)}else this.$element.trigger(t,i)},c.ignore=function(t){var e=this.getItem(t);e&&(e.isIgnored=!0)},c.unignore=function(t){var e=this.getItem(t);e&&delete e.isIgnored},c.stamp=function(t){t=this._find(t),t&&(this.stamps=this.stamps.concat(t),t.forEach(this.ignore,this))},c.unstamp=function(t){t=this._find(t),t&&t.forEach(function(t){o.removeFrom(this.stamps,t),this.unignore(t)},this)},c._find=function(t){if(t)return"string"==typeof t&&(t=this.element.querySelectorAll(t)),t=o.makeArray(t)},c._manageStamps=function(){this.stamps&&this.stamps.length&&(this._getBoundingRect(),this.stamps.forEach(this._manageStamp,this))},c._getBoundingRect=function(){var t=this.element.getBoundingClientRect(),e=this.size;this._boundingRect={left:t.left+e.paddingLeft+e.borderLeftWidth,top:t.top+e.paddingTop+e.borderTopWidth,right:t.right-(e.paddingRight+e.borderRightWidth),bottom:t.bottom-(e.paddingBottom+e.borderBottomWidth)}},c._manageStamp=d,c._getElementOffset=function(t){var e=t.getBoundingClientRect(),o=this._boundingRect,n=i(t),s={left:e.left-o.left-n.marginLeft,top:e.top-o.top-n.marginTop,right:o.right-e.right-n.marginRight,bottom:o.bottom-e.bottom-n.marginBottom};return s},c.handleEvent=o.handleEvent,c.bindResize=function(){t.addEventListener("resize",this),this.isResizeBound=!0},c.unbindResize=function(){t.removeEventListener("resize",this),this.isResizeBound=!1},c.onresize=function(){this.resize()},o.debounceMethod(s,"onresize",100),c.resize=function(){this.isResizeBound&&this.needsResizeLayout()&&this.layout()},c.needsResizeLayout=function(){var t=i(this.element),e=this.size&&t;return e&&t.innerWidth!==this.size.innerWidth},c.addItems=function(t){var e=this._itemize(t);return e.length&&(this.items=this.items.concat(e)),e},c.appended=function(t){var e=this.addItems(t);e.length&&(this.layoutItems(e,!0),this.reveal(e))},c.prepended=function(t){var e=this._itemize(t);if(e.length){var i=this.items.slice(0);this.items=e.concat(i),this._resetLayout(),this._manageStamps(),this.layoutItems(e,!0),this.reveal(e),this.layoutItems(i)}},c.reveal=function(t){if(this._emitCompleteOnItems("reveal",t),t&&t.length){var e=this.updateStagger();t.forEach(function(t,i){t.stagger(i*e),t.reveal()})}},c.hide=function(t){if(this._emitCompleteOnItems("hide",t),t&&t.length){var e=this.updateStagger();t.forEach(function(t,i){t.stagger(i*e),t.hide()})}},c.revealItemElements=function(t){var e=this.getItems(t);this.reveal(e)},c.hideItemElements=function(t){var e=this.getItems(t);this.hide(e)},c.getItem=function(t){for(var e=0;e<this.items.length;e++){var i=this.items[e];if(i.element==t)return i}},c.getItems=function(t){t=o.makeArray(t);var e=[];return t.forEach(function(t){var i=this.getItem(t);i&&e.push(i)},this),e},c.remove=function(t){var e=this.getItems(t);this._emitCompleteOnItems("remove",e),e&&e.length&&e.forEach(function(t){t.remove(),o.removeFrom(this.items,t)},this)},c.destroy=function(){var t=this.element.style;t.height="",t.position="",t.width="",this.items.forEach(function(t){t.destroy()}),this.unbindResize();var e=this.element.outlayerGUID;delete f[e],delete this.element.outlayerGUID,h&&h.removeData(this.element,this.constructor.namespace)},s.data=function(t){t=o.getQueryElement(t);var e=t&&t.outlayerGUID;return e&&f[e]},s.create=function(t,e){var i=r(s);return i.defaults=o.extend({},s.defaults),o.extend(i.defaults,e),i.compatOptions=o.extend({},s.compatOptions),i.namespace=t,i.data=s.data,i.Item=r(n),o.htmlInit(i,t),h&&h.bridget&&h.bridget(t,i),i};var m={ms:1,s:1e3};return s.Item=n,s}),function(t,e){"function"==typeof define&&define.amd?define("isotope-layout/js/item",["outlayer/outlayer"],e):"object"==typeof module&&module.exports?module.exports=e(require("outlayer")):(t.Isotope=t.Isotope||{},t.Isotope.Item=e(t.Outlayer))}(window,function(t){"use strict";function e(){t.Item.apply(this,arguments)}var i=e.prototype=Object.create(t.Item.prototype),o=i._create;i._create=function(){this.id=this.layout.itemGUID++,o.call(this),this.sortData={}},i.updateSortData=function(){if(!this.isIgnored){this.sortData.id=this.id,this.sortData["original-order"]=this.id,this.sortData.random=Math.random();var t=this.layout.options.getSortData,e=this.layout._sorters;for(var i in t){var o=e[i];this.sortData[i]=o(this.element,this)}}};var n=i.destroy;return i.destroy=function(){n.apply(this,arguments),this.css({display:""})},e}),function(t,e){"function"==typeof define&&define.amd?define("isotope-layout/js/layout-mode",["get-size/get-size","outlayer/outlayer"],e):"object"==typeof module&&module.exports?module.exports=e(require("get-size"),require("outlayer")):(t.Isotope=t.Isotope||{},t.Isotope.LayoutMode=e(t.getSize,t.Outlayer))}(window,function(t,e){"use strict";function i(t){this.isotope=t,t&&(this.options=t.options[this.namespace],this.element=t.element,this.items=t.filteredItems,this.size=t.size)}var o=i.prototype,n=["_resetLayout","_getItemLayoutPosition","_manageStamp","_getContainerSize","_getElementOffset","needsResizeLayout","_getOption"];return n.forEach(function(t){o[t]=function(){return e.prototype[t].apply(this.isotope,arguments)}}),o.needsVerticalResizeLayout=function(){var e=t(this.isotope.element),i=this.isotope.size&&e;return i&&e.innerHeight!=this.isotope.size.innerHeight},o._getMeasurement=function(){this.isotope._getMeasurement.apply(this,arguments)},o.getColumnWidth=function(){this.getSegmentSize("column","Width")},o.getRowHeight=function(){this.getSegmentSize("row","Height")},o.getSegmentSize=function(t,e){var i=t+e,o="outer"+e;if(this._getMeasurement(i,o),!this[i]){var n=this.getFirstItemSize();this[i]=n&&n[o]||this.isotope.size["inner"+e]}},o.getFirstItemSize=function(){var e=this.isotope.filteredItems[0];return e&&e.element&&t(e.element)},o.layout=function(){this.isotope.layout.apply(this.isotope,arguments)},o.getSize=function(){this.isotope.getSize(),this.size=this.isotope.size},i.modes={},i.create=function(t,e){function n(){i.apply(this,arguments)}return n.prototype=Object.create(o),n.prototype.constructor=n,e&&(n.options=e),n.prototype.namespace=t,i.modes[t]=n,n},i}),function(t,e){"function"==typeof define&&define.amd?define("masonry-layout/masonry",["outlayer/outlayer","get-size/get-size"],e):"object"==typeof module&&module.exports?module.exports=e(require("outlayer"),require("get-size")):t.Masonry=e(t.Outlayer,t.getSize)}(window,function(t,e){var i=t.create("masonry");i.compatOptions.fitWidth="isFitWidth";var o=i.prototype;return o._resetLayout=function(){this.getSize(),this._getMeasurement("columnWidth","outerWidth"),this._getMeasurement("gutter","outerWidth"),this.measureColumns(),this.colYs=[];for(var t=0;t<this.cols;t++)this.colYs.push(0);this.maxY=0,this.horizontalColIndex=0},o.measureColumns=function(){if(this.getContainerWidth(),!this.columnWidth){var t=this.items[0],i=t&&t.element;this.columnWidth=i&&e(i).outerWidth||this.containerWidth}var o=this.columnWidth+=this.gutter,n=this.containerWidth+this.gutter,s=n/o,r=o-n%o,a=r&&r<1?"round":"floor";s=Math[a](s),this.cols=Math.max(s,1)},o.getContainerWidth=function(){var t=this._getOption("fitWidth"),i=t?this.element.parentNode:this.element,o=e(i);this.containerWidth=o&&o.innerWidth},o._getItemLayoutPosition=function(t){t.getSize();var e=t.size.outerWidth%this.columnWidth,i=e&&e<1?"round":"ceil",o=Math[i](t.size.outerWidth/this.columnWidth);o=Math.min(o,this.cols);for(var n=this.options.horizontalOrder?"_getHorizontalColPosition":"_getTopColPosition",s=this[n](o,t),r={x:this.columnWidth*s.col,y:s.y},a=s.y+t.size.outerHeight,u=o+s.col,h=s.col;h<u;h++)this.colYs[h]=a;return r},o._getTopColPosition=function(t){var e=this._getTopColGroup(t),i=Math.min.apply(Math,e);return{col:e.indexOf(i),y:i}},o._getTopColGroup=function(t){if(t<2)return this.colYs;for(var e=[],i=this.cols+1-t,o=0;o<i;o++)e[o]=this._getColGroupY(o,t);return e},o._getColGroupY=function(t,e){if(e<2)return this.colYs[t];var i=this.colYs.slice(t,t+e);return Math.max.apply(Math,i)},o._getHorizontalColPosition=function(t,e){var i=this.horizontalColIndex%this.cols,o=t>1&&i+t>this.cols;i=o?0:i;var n=e.size.outerWidth&&e.size.outerHeight;return this.horizontalColIndex=n?i+t:this.horizontalColIndex,{col:i,y:this._getColGroupY(i,t)}},o._manageStamp=function(t){var i=e(t),o=this._getElementOffset(t),n=this._getOption("originLeft"),s=n?o.left:o.right,r=s+i.outerWidth,a=Math.floor(s/this.columnWidth);a=Math.max(0,a);var u=Math.floor(r/this.columnWidth);u-=r%this.columnWidth?0:1,u=Math.min(this.cols-1,u);for(var h=this._getOption("originTop"),d=(h?o.top:o.bottom)+i.outerHeight,l=a;l<=u;l++)this.colYs[l]=Math.max(d,this.colYs[l])},o._getContainerSize=function(){this.maxY=Math.max.apply(Math,this.colYs);var t={height:this.maxY};return this._getOption("fitWidth")&&(t.width=this._getContainerFitWidth()),t},o._getContainerFitWidth=function(){for(var t=0,e=this.cols;--e&&0===this.colYs[e];)t++;return(this.cols-t)*this.columnWidth-this.gutter},o.needsResizeLayout=function(){var t=this.containerWidth;return this.getContainerWidth(),t!=this.containerWidth},i}),function(t,e){"function"==typeof define&&define.amd?define("isotope-layout/js/layout-modes/masonry",["../layout-mode","masonry-layout/masonry"],e):"object"==typeof module&&module.exports?module.exports=e(require("../layout-mode"),require("masonry-layout")):e(t.Isotope.LayoutMode,t.Masonry)}(window,function(t,e){"use strict";var i=t.create("masonry"),o=i.prototype,n={_getElementOffset:!0,layout:!0,_getMeasurement:!0};for(var s in e.prototype)n[s]||(o[s]=e.prototype[s]);var r=o.measureColumns;o.measureColumns=function(){this.items=this.isotope.filteredItems,r.call(this)};var a=o._getOption;return o._getOption=function(t){return"fitWidth"==t?void 0!==this.options.isFitWidth?this.options.isFitWidth:this.options.fitWidth:a.apply(this.isotope,arguments)},i}),function(t,e){"function"==typeof define&&define.amd?define("isotope-layout/js/layout-modes/fit-rows",["../layout-mode"],e):"object"==typeof exports?module.exports=e(require("../layout-mode")):e(t.Isotope.LayoutMode)}(window,function(t){"use strict";var e=t.create("fitRows"),i=e.prototype;return i._resetLayout=function(){this.x=0,this.y=0,this.maxY=0,this._getMeasurement("gutter","outerWidth")},i._getItemLayoutPosition=function(t){t.getSize();var e=t.size.outerWidth+this.gutter,i=this.isotope.size.innerWidth+this.gutter;0!==this.x&&e+this.x>i&&(this.x=0,this.y=this.maxY);var o={x:this.x,y:this.y};return this.maxY=Math.max(this.maxY,this.y+t.size.outerHeight),this.x+=e,o},i._getContainerSize=function(){return{height:this.maxY}},e}),function(t,e){"function"==typeof define&&define.amd?define("isotope-layout/js/layout-modes/vertical",["../layout-mode"],e):"object"==typeof module&&module.exports?module.exports=e(require("../layout-mode")):e(t.Isotope.LayoutMode)}(window,function(t){"use strict";var e=t.create("vertical",{horizontalAlignment:0}),i=e.prototype;return i._resetLayout=function(){this.y=0},i._getItemLayoutPosition=function(t){t.getSize();var e=(this.isotope.size.innerWidth-t.size.outerWidth)*this.options.horizontalAlignment,i=this.y;return this.y+=t.size.outerHeight,{x:e,y:i}},i._getContainerSize=function(){return{height:this.y}},e}),function(t,e){"function"==typeof define&&define.amd?define(["outlayer/outlayer","get-size/get-size","desandro-matches-selector/matches-selector","fizzy-ui-utils/utils","isotope-layout/js/item","isotope-layout/js/layout-mode","isotope-layout/js/layout-modes/masonry","isotope-layout/js/layout-modes/fit-rows","isotope-layout/js/layout-modes/vertical"],function(i,o,n,s,r,a){return e(t,i,o,n,s,r,a)}):"object"==typeof module&&module.exports?module.exports=e(t,require("outlayer"),require("get-size"),require("desandro-matches-selector"),require("fizzy-ui-utils"),require("isotope-layout/js/item"),require("isotope-layout/js/layout-mode"),require("isotope-layout/js/layout-modes/masonry"),require("isotope-layout/js/layout-modes/fit-rows"),require("isotope-layout/js/layout-modes/vertical")):t.Isotope=e(t,t.Outlayer,t.getSize,t.matchesSelector,t.fizzyUIUtils,t.Isotope.Item,t.Isotope.LayoutMode)}(window,function(t,e,i,o,n,s,r){function a(t,e){return function(i,o){for(var n=0;n<t.length;n++){var s=t[n],r=i.sortData[s],a=o.sortData[s];if(r>a||r<a){var u=void 0!==e[s]?e[s]:e,h=u?1:-1;return(r>a?1:-1)*h}}return 0}}var u=t.jQuery,h=String.prototype.trim?function(t){return t.trim()}:function(t){return t.replace(/^\s+|\s+$/g,"")},d=e.create("isotope",{layoutMode:"masonry",isJQueryFiltering:!0,sortAscending:!0});d.Item=s,d.LayoutMode=r;var l=d.prototype;l._create=function(){this.itemGUID=0,this._sorters={},this._getSorters(),e.prototype._create.call(this),this.modes={},this.filteredItems=this.items,this.sortHistory=["original-order"];for(var t in r.modes)this._initLayoutMode(t)},l.reloadItems=function(){this.itemGUID=0,e.prototype.reloadItems.call(this)},l._itemize=function(){for(var t=e.prototype._itemize.apply(this,arguments),i=0;i<t.length;i++){var o=t[i];o.id=this.itemGUID++}return this._updateItemsSortData(t),t},l._initLayoutMode=function(t){var e=r.modes[t],i=this.options[t]||{};this.options[t]=e.options?n.extend(e.options,i):i,this.modes[t]=new e(this)},l.layout=function(){return!this._isLayoutInited&&this._getOption("initLayout")?void this.arrange():void this._layout()},l._layout=function(){var t=this._getIsInstant();this._resetLayout(),this._manageStamps(),this.layoutItems(this.filteredItems,t),this._isLayoutInited=!0},l.arrange=function(t){this.option(t),this._getIsInstant();var e=this._filter(this.items);this.filteredItems=e.matches,this._bindArrangeComplete(),this._isInstant?this._noTransition(this._hideReveal,[e]):this._hideReveal(e),this._sort(),this._layout()},l._init=l.arrange,l._hideReveal=function(t){this.reveal(t.needReveal),this.hide(t.needHide)},l._getIsInstant=function(){var t=this._getOption("layoutInstant"),e=void 0!==t?t:!this._isLayoutInited;return this._isInstant=e,e},l._bindArrangeComplete=function(){function t(){e&&i&&o&&n.dispatchEvent("arrangeComplete",null,[n.filteredItems])}var e,i,o,n=this;this.once("layoutComplete",function(){e=!0,t()}),this.once("hideComplete",function(){i=!0,t()}),this.once("revealComplete",function(){o=!0,t()})},l._filter=function(t){var e=this.options.filter;e=e||"*";for(var i=[],o=[],n=[],s=this._getFilterTest(e),r=0;r<t.length;r++){var a=t[r];if(!a.isIgnored){var u=s(a);u&&i.push(a),u&&a.isHidden?o.push(a):u||a.isHidden||n.push(a)}}return{matches:i,needReveal:o,needHide:n}},l._getFilterTest=function(t){return u&&this.options.isJQueryFiltering?function(e){return u(e.element).is(t);
}:"function"==typeof t?function(e){return t(e.element)}:function(e){return o(e.element,t)}},l.updateSortData=function(t){var e;t?(t=n.makeArray(t),e=this.getItems(t)):e=this.items,this._getSorters(),this._updateItemsSortData(e)},l._getSorters=function(){var t=this.options.getSortData;for(var e in t){var i=t[e];this._sorters[e]=f(i)}},l._updateItemsSortData=function(t){for(var e=t&&t.length,i=0;e&&i<e;i++){var o=t[i];o.updateSortData()}};var f=function(){function t(t){if("string"!=typeof t)return t;var i=h(t).split(" "),o=i[0],n=o.match(/^\[(.+)\]$/),s=n&&n[1],r=e(s,o),a=d.sortDataParsers[i[1]];return t=a?function(t){return t&&a(r(t))}:function(t){return t&&r(t)}}function e(t,e){return t?function(e){return e.getAttribute(t)}:function(t){var i=t.querySelector(e);return i&&i.textContent}}return t}();d.sortDataParsers={parseInt:function(t){return parseInt(t,10)},parseFloat:function(t){return parseFloat(t)}},l._sort=function(){if(this.options.sortBy){var t=n.makeArray(this.options.sortBy);this._getIsSameSortBy(t)||(this.sortHistory=t.concat(this.sortHistory));var e=a(this.sortHistory,this.options.sortAscending);this.filteredItems.sort(e)}},l._getIsSameSortBy=function(t){for(var e=0;e<t.length;e++)if(t[e]!=this.sortHistory[e])return!1;return!0},l._mode=function(){var t=this.options.layoutMode,e=this.modes[t];if(!e)throw new Error("No layout mode: "+t);return e.options=this.options[t],e},l._resetLayout=function(){e.prototype._resetLayout.call(this),this._mode()._resetLayout()},l._getItemLayoutPosition=function(t){return this._mode()._getItemLayoutPosition(t)},l._manageStamp=function(t){this._mode()._manageStamp(t)},l._getContainerSize=function(){return this._mode()._getContainerSize()},l.needsResizeLayout=function(){return this._mode().needsResizeLayout()},l.appended=function(t){var e=this.addItems(t);if(e.length){var i=this._filterRevealAdded(e);this.filteredItems=this.filteredItems.concat(i)}},l.prepended=function(t){var e=this._itemize(t);if(e.length){this._resetLayout(),this._manageStamps();var i=this._filterRevealAdded(e);this.layoutItems(this.filteredItems),this.filteredItems=i.concat(this.filteredItems),this.items=e.concat(this.items)}},l._filterRevealAdded=function(t){var e=this._filter(t);return this.hide(e.needHide),this.reveal(e.matches),this.layoutItems(e.matches,!0),e.matches},l.insert=function(t){var e=this.addItems(t);if(e.length){var i,o,n=e.length;for(i=0;i<n;i++)o=e[i],this.element.appendChild(o.element);var s=this._filter(e).matches;for(i=0;i<n;i++)e[i].isLayoutInstant=!0;for(this.arrange(),i=0;i<n;i++)delete e[i].isLayoutInstant;this.reveal(s)}};var c=l.remove;return l.remove=function(t){t=n.makeArray(t);var e=this.getItems(t);c.call(this,t);for(var i=e&&e.length,o=0;i&&o<i;o++){var s=e[o];n.removeFrom(this.filteredItems,s)}},l.shuffle=function(){for(var t=0;t<this.items.length;t++){var e=this.items[t];e.sortData.random=Math.random()}this.options.sortBy="random",this._sort(),this._layout()},l._noTransition=function(t,e){var i=this.options.transitionDuration;this.options.transitionDuration=0;var o=t.apply(this,e);return this.options.transitionDuration=i,o},l.getFilteredItemElements=function(){return this.filteredItems.map(function(t){return t.element})},d});

/*!
 * imagesLoaded PACKAGED v4.1.4
 * JavaScript is all like "You images are done yet or what?"
 * MIT License
 */

!function(e,t){"function"==typeof define&&define.amd?define("ev-emitter/ev-emitter",t):"object"==typeof module&&module.exports?module.exports=t():e.EvEmitter=t()}("undefined"!=typeof window?window:this,function(){function e(){}var t=e.prototype;return t.on=function(e,t){if(e&&t){var i=this._events=this._events||{},n=i[e]=i[e]||[];return n.indexOf(t)==-1&&n.push(t),this}},t.once=function(e,t){if(e&&t){this.on(e,t);var i=this._onceEvents=this._onceEvents||{},n=i[e]=i[e]||{};return n[t]=!0,this}},t.off=function(e,t){var i=this._events&&this._events[e];if(i&&i.length){var n=i.indexOf(t);return n!=-1&&i.splice(n,1),this}},t.emitEvent=function(e,t){var i=this._events&&this._events[e];if(i&&i.length){i=i.slice(0),t=t||[];for(var n=this._onceEvents&&this._onceEvents[e],o=0;o<i.length;o++){var r=i[o],s=n&&n[r];s&&(this.off(e,r),delete n[r]),r.apply(this,t)}return this}},t.allOff=function(){delete this._events,delete this._onceEvents},e}),function(e,t){"use strict";"function"==typeof define&&define.amd?define(["ev-emitter/ev-emitter"],function(i){return t(e,i)}):"object"==typeof module&&module.exports?module.exports=t(e,require("ev-emitter")):e.imagesLoaded=t(e,e.EvEmitter)}("undefined"!=typeof window?window:this,function(e,t){function i(e,t){for(var i in t)e[i]=t[i];return e}function n(e){if(Array.isArray(e))return e;var t="object"==typeof e&&"number"==typeof e.length;return t?d.call(e):[e]}function o(e,t,r){if(!(this instanceof o))return new o(e,t,r);var s=e;return"string"==typeof e&&(s=document.querySelectorAll(e)),s?(this.elements=n(s),this.options=i({},this.options),"function"==typeof t?r=t:i(this.options,t),r&&this.on("always",r),this.getImages(),h&&(this.jqDeferred=new h.Deferred),void setTimeout(this.check.bind(this))):void a.error("Bad element for imagesLoaded "+(s||e))}function r(e){this.img=e}function s(e,t){this.url=e,this.element=t,this.img=new Image}var h=e.jQuery,a=e.console,d=Array.prototype.slice;o.prototype=Object.create(t.prototype),o.prototype.options={},o.prototype.getImages=function(){this.images=[],this.elements.forEach(this.addElementImages,this)},o.prototype.addElementImages=function(e){"IMG"==e.nodeName&&this.addImage(e),this.options.background===!0&&this.addElementBackgroundImages(e);var t=e.nodeType;if(t&&u[t]){for(var i=e.querySelectorAll("img"),n=0;n<i.length;n++){var o=i[n];this.addImage(o)}if("string"==typeof this.options.background){var r=e.querySelectorAll(this.options.background);for(n=0;n<r.length;n++){var s=r[n];this.addElementBackgroundImages(s)}}}};var u={1:!0,9:!0,11:!0};return o.prototype.addElementBackgroundImages=function(e){var t=getComputedStyle(e);if(t)for(var i=/url\((['"])?(.*?)\1\)/gi,n=i.exec(t.backgroundImage);null!==n;){var o=n&&n[2];o&&this.addBackground(o,e),n=i.exec(t.backgroundImage)}},o.prototype.addImage=function(e){var t=new r(e);this.images.push(t)},o.prototype.addBackground=function(e,t){var i=new s(e,t);this.images.push(i)},o.prototype.check=function(){function e(e,i,n){setTimeout(function(){t.progress(e,i,n)})}var t=this;return this.progressedCount=0,this.hasAnyBroken=!1,this.images.length?void this.images.forEach(function(t){t.once("progress",e),t.check()}):void this.complete()},o.prototype.progress=function(e,t,i){this.progressedCount++,this.hasAnyBroken=this.hasAnyBroken||!e.isLoaded,this.emitEvent("progress",[this,e,t]),this.jqDeferred&&this.jqDeferred.notify&&this.jqDeferred.notify(this,e),this.progressedCount==this.images.length&&this.complete(),this.options.debug&&a&&a.log("progress: "+i,e,t)},o.prototype.complete=function(){var e=this.hasAnyBroken?"fail":"done";if(this.isComplete=!0,this.emitEvent(e,[this]),this.emitEvent("always",[this]),this.jqDeferred){var t=this.hasAnyBroken?"reject":"resolve";this.jqDeferred[t](this)}},r.prototype=Object.create(t.prototype),r.prototype.check=function(){var e=this.getIsImageComplete();return e?void this.confirm(0!==this.img.naturalWidth,"naturalWidth"):(this.proxyImage=new Image,this.proxyImage.addEventListener("load",this),this.proxyImage.addEventListener("error",this),this.img.addEventListener("load",this),this.img.addEventListener("error",this),void(this.proxyImage.src=this.img.src))},r.prototype.getIsImageComplete=function(){return this.img.complete&&this.img.naturalWidth},r.prototype.confirm=function(e,t){this.isLoaded=e,this.emitEvent("progress",[this,this.img,t])},r.prototype.handleEvent=function(e){var t="on"+e.type;this[t]&&this[t](e)},r.prototype.onload=function(){this.confirm(!0,"onload"),this.unbindEvents()},r.prototype.onerror=function(){this.confirm(!1,"onerror"),this.unbindEvents()},r.prototype.unbindEvents=function(){this.proxyImage.removeEventListener("load",this),this.proxyImage.removeEventListener("error",this),this.img.removeEventListener("load",this),this.img.removeEventListener("error",this)},s.prototype=Object.create(r.prototype),s.prototype.check=function(){this.img.addEventListener("load",this),this.img.addEventListener("error",this),this.img.src=this.url;var e=this.getIsImageComplete();e&&(this.confirm(0!==this.img.naturalWidth,"naturalWidth"),this.unbindEvents())},s.prototype.unbindEvents=function(){this.img.removeEventListener("load",this),this.img.removeEventListener("error",this)},s.prototype.confirm=function(e,t){this.isLoaded=e,this.emitEvent("progress",[this,this.element,t])},o.makeJQueryPlugin=function(t){t=t||e.jQuery,t&&(h=t,h.fn.imagesLoaded=function(e,t){var i=new o(this,e,t);return i.jqDeferred.promise(h(this))})},o.makeJQueryPlugin(),o});

/**
 *  Blog With Grid Style
 */
var $container = jQuery('.kmt-row').imagesLoaded( function() {
    $container.isotope({
          itemSelector : '.grid-item', 
          layoutMode : 'masonry',
          percentPosition: true
    });
});