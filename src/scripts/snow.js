// import {
//   f as undefinedH,
//   C as undefinedF,
//   o as undefinedL,
//   j as undefinedX
// } from './entry.7462de3f.js'

export function initSnow() {
  console.log('initSnow start')

  const canvas = document.getElementById('snow')

  if (!canvas) return

  console.log(canvas.clientWidth)

  var flakes = [],
    size = 3,
    count = canvas.clientWidth / 1440 * 300,
    opacity = 0.7,
    context = canvas.getContext('2d'),
    width = canvas.clientWidth,
    height = canvas.clientHeight

  canvas.width = width
  canvas.height = height

  for (var d = 0; d < count; d++) {
    flakes.push({
      x: Math.random() * width,
      y: Math.random() * height,
      r: Math.random(Math.min(size)) * size,
      d: Math.random() * count
    })
  }
  
  function draw() {
    context.clearRect(0, 0, width, height),
      (context.fillStyle = 'rgba(255, 255, 255, ' + opacity + ')'),
      context.beginPath()
    for (var n = 0; n < count; n++) {
      var flake = flakes[n]
      context.moveTo(flake.x, flake.y), context.arc(flake.x, flake.y, flake.r, 0, Math.PI * 2, !0)
    }
    context.fill(), step()
  }

  let progress = 0.005

  function step() {
    progress += 0.005
    for (var n = 0; n < count; n++) {
      var flake = flakes[n]
      ;(flake.y += Math.cos(flake.d) + flake.r),
        (flake.x += (Math.sin(progress) * Math.PI) / 10),
        flake.y > height && (flakes[n] = { x: Math.random() * width, y: 0, r: flake.r, d: flake.d })
    }
  }

  ;(function run() {
    requestAnimationFrame(run), draw()
  })()

  // const y = { id: 'snow' },
  //   M = {
  //     __name: 'CanvasSnow',
  //     setup(g) {
  //       // undefinedF(() => {
  //       //   ;(window.requestAnimFrame = (function () {
  //       //     return (
  //       //       window.requestAnimationFrame ||
  //       //       window.webkitRequestAnimationFrame ||
  //       //       window.mozRequestAnimationFrame ||
  //       //       function (a) {
  //       //         window.setTimeout(a, 1e3 / 60)
  //       //       }
  //       //     )
  //       //   })()),
  //       //     w()
  //       // })
  //       function w() {
  //         var flakes = [],
  //           c = 2.5,
  //           r = 1e3,
  //           u = 0.7,
  //           canvas = document.getElementById('snow'),
  //           context = canvas.getContext('2d'),
  //           width = window.innerWidth,
  //           height = window.innerHeight
  //         ;(canvas.width = width), (canvas.height = height)
  //         for (var d = 0; d < r; d++)
  //           flakes.push({
  //             x: Math.random() * width,
  //             y: Math.random() * height,
  //             r: Math.random(Math.min(c)) * c,
  //             d: Math.random() * r
  //           })
  //         function draw() {
  //           context.clearRect(0, 0, width, height),
  //             (context.fillStyle = 'rgba(255, 255, 255, ' + u + ')'),
  //             context.beginPath()
  //           for (var n = 0; n < r; n++) {
  //             var flake = flakes[n]
  //             context.moveTo(flake.x, flake.y), context.arc(flake.x, flake.y, flake.r, 0, Math.PI * 2, !0)
  //           }
  //           context.fill(), step()
  //         }
  //         var progress = 0.005
  //         function step() {
  //           progress += 0.005
  //           for (var n = 0; n < r; n++) {
  //             var e = flakes[n]
  //             ;(e.y += Math.cos(e.d) + e.r),
  //               (e.x += (Math.sin(progress) * Math.PI) / 10),
  //               e.y > height && (flakes[n] = { x: Math.random() * width, y: 0, r: e.r, d: e.d })
  //           }
  //         }
  //         ;(function run() {
  //           requestAnimFrame(run), draw()
  //         })()
  //       }
  //       return (a, c) => (undefinedL(), undefinedX('canvas', y))
  //     }
  //   },
  //   C = undefinedH(M, [['__scopeId', 'data-v-fe9c90e9']])

  console.log('initSnow end')
}
