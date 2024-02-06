from flask import Flask, request, jsonify, render_template
from flask_cors import CORS
import cv2
import os
import numpy as np
import tensorflow as tf
from tensorflow.keras.models import load_model
app = Flask(__name__)


CORS(app) # allow from all
# cors = CORS(app, resources={r"/getResult": {"origins": "http://localhost"}}) # allow from only specified


#add decorators
@app.route("/")
def home():
    return render_template("index.html")

@app.route("/getResult",methods=["GET"])
def cancer():
    data = {
        "result":"normal"
    }

    query = request.args.get("image")
    if query:
        lung_cancer_model = load_model("./cancer_predictor.h5")
        imgTest = cv2.imread("./images/"+query)
        resize = tf.image.resize(imgTest, (256,256))
        model_prediction = lung_cancer_model.predict(np.expand_dims(resize/255,0))
        predicted_class = model_prediction.argmax(axis=1)[0]
        print(predicted_class)

        if predicted_class == 0:
            data["result"] = "Benign"
        elif predicted_class == 1:
            data["result"] = "Malignant"
        else:
            data["result"] = "Normal"

        return jsonify(data), 200


    return jsonify(data), 200

@app.route('/<path:path>')
def catch_all(path):
    error_message = "Route not found"
    return jsonify(error=error_message), 404
    # return render_template("index.html")

if __name__ == "__main__":
    app.run(debug=True)

