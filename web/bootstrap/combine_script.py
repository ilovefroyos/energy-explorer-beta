#!/usr/bin/python
# -------------------------------
# combine_script.py
#
#   Combine your js and css files into a single file.
#
# River Allen.
# 2014.
# -------------------------------

import os

CSS_DIR = os.path.join("css", "%s")
JS_DIR = os.path.join("js", "%s")

# All js files to be combined in the order specified.
css_files = [
            CSS_DIR % "bootstrap.css",
            CSS_DIR % "bootstrap-responsive.css",
            CSS_DIR % "responsiveslides.css",
            CSS_DIR % "animate.min.css",
            CSS_DIR % "global.css",
            ]
# All css files to be combined in the order specified.
js_files = [
            JS_DIR % "bootstrap.min.js",
            JS_DIR % "jquery.color.js",
            JS_DIR % "snap.svg-min.js",
            JS_DIR % "responsiveslides.min.js",
            JS_DIR % "mcVideoPlugin.js",
            JS_DIR % "main.js",
            JS_DIR % "jquery.bullseye-1.0-min.js",
            JS_DIR % "jquery-ui.min.js",
            JS_DIR % "topojson.v1.min.js",
            JS_DIR % "d3.v3.min.js",
            JS_DIR % "colorbrewer.js",
            JS_DIR % "jquery.localscroll-1.2.7-min.js",
            JS_DIR % "jquery.parallax-1.1.3.js",
            JS_DIR % "jquery.scrollTo-1.4.2-min.js",

            JS_DIR % "logo.js",
            JS_DIR % "custom_ajax_navigation.js",
            ]

def combine_files(input_files, output_filename, write_filename=True):
    if len(input_files) == 0:
        return
    # Open our combined output file.
    with open(output_filename, "wb") as output_fh:
        # Go through each input file and append it to our combined
        # output file.
        for input_file in input_files:
            # Add the filename above each appended file. This can make it
            # easier to orient within the combined file, but takes up more
            # data.
            if write_filename:
                output_fh.write("/* {0} */\n".format(input_file))
            with open(input_file, "rb") as input_fh:
                for line in input_fh.readlines():
                    output_fh.write(line)
                output_fh.write("\n")

if __name__ == "__main__":
    combine_files(css_files, CSS_DIR % "combined.css")
    combine_files(js_files, JS_DIR % "combined.js")

