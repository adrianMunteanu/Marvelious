import Glide from "@glidejs/glide/dist/glide";

window.$(document).ready(function () {
    new Glide('.glide', {
        type: 'carousel',
        focusAt: 'center',
        perView: 3,
        autoplay: true
    });
});

const s = '[data-ref="frame"]';

if (document.querySelector(s)) {
    new Glide('.glide', {
        type: "carousel",
        focusAt: "center",
        startAt: 7,
        perView: 6,
        peek: 50,
        gap: 30,
        autoplay: 2500,
        hoverpause: !1,
        animationDuration: 1e3,
        rewindDuration: 2e3,
        touchRatio: .25,
        perTouch: 1,
        breakpoints: {
            480: {
                gap: 15,
                peek: 75,
                perView: 1
            },
            768: {
                perView: 2
            },
            1360: {
                perView: 4
            },
            1600: {
                perView: 5
            },
            1960: {
                perView: 6
            }
        }
    }).mount({
        Coverflow: function(e, t, n) {
            const i = {
                tilt(e) {
                    e.querySelector(s).style.transform = "perspective(1500px) rotateY(0deg)",
                        this.tiltPrevElements(e),
                        this.tiltNextElements(e)
                },
                tiltPrevElements(e) {
                    let t = function(e) {
                        let t = [];
                        if (e)
                            for (; e = e.previousElementSibling; )
                                t.push(e);
                        return t
                    }(e);
                    for (let e = 0; e < t.length; e++) {
                        let n = t[e].querySelector(s);
                        n.style.transformOrigin = "100% 50%",
                            n.style.transform = `perspective(1500px) rotateY(${20 * Math.max(e, 2)}deg)`
                    }
                },
                tiltNextElements(e) {
                    let t = function(e) {
                        let t = [];
                        if (e)
                            for (; e = e.nextElementSibling; )
                                t.push(e);
                        return t
                    }(e);
                    for (let e = 0; e < t.length; e++) {
                        let n = t[e].querySelector(s);
                        n.style.transformOrigin = "0% 50%",
                            n.style.transform = `perspective(1500px) rotateY(${-20 * Math.max(e, 2)}deg)`
                    }
                }
            };
            return n.on(["mount.after", "run"], ()=>{
                    i.tilt(t.Html.slides[e.index])
                }
            );
        }
    });
}
