<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$surat->nama}}</title>
</head>
<body>
    <!-- Elemen di mana PSPDFKit akan dimuat. -->
    <div id="pspdfkit" style="height: 100vh"></div>

    <!-- Menggunakan fungsi asset untuk path script PSPDFKit -->
    <script src="{{ asset('Assets/Admin/pdf/package/dist/pspdfkit.js') }}"></script>

    <script>
        try {
            PSPDFKit.load({
                container: "#pspdfkit",
                document: "{{ asset('Assets/Admin/Upload/'.$surat->lampiran) }}", // Spasi diganti dengan %20
            })
            .then(function(instance) {
                console.log("PSPDFKit loaded", instance);
            })
            .catch(function(error) {
                console.error("PSPDFKit error:", error.message);
            });
        } catch (error) {
            console.error("An error occurred:", error);
        }
    </script>
</body>
</html>
