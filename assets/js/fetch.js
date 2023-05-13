function fetch_data() {
    var input1 = document.getElementById('origin').value;
    var input2 = "<?php echo $origin; ?>"
    // console.log("already fetching data")
    console.log(input2)

    const data = [input1, input2]

    for (var i = 0; i < data.length; i++) { 
        console.log(data[i]);
        //console.log("hello");
    }
}

fetch_data();