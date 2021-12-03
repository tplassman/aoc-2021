(require '[clojure.string :as str])

(let [[xf yf aimf]
  (->> (str/split-lines (slurp "input")) ;; Load input
    (filter not-empty) ;; Strip empty lines
    (map #(str/split % #" ")) ;; Split command into direction and value
    (map #(vector (first %) (Integer/parseInt (second %)))) ;; Parse value into int
    (reduce (fn [[x y aim] [direction value]]
      (case direction
        "forward" [(+ x value) (+ y (* aim value)) aim]
        "up" [x y (- aim value)]
        "down" [x y (+ aim value)])) [0 0 0]))]
  (print (* xf yf)))
