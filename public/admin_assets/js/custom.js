        let UploadArea = document.getElementById('Upload_Window')

        let UploadContainer = document.getElementById('Upload_Container')

        UploadArea.addEventListener("dragover", (e) => {
            e.stopPropagation();
            e.preventDefault();
        });

        UploadArea.addEventListener("dragenter", (e) => {
            e.stopPropagation();
            e.preventDefault();
            UploadContainer.classList.add("dragover");
            UploadContainer.classList.remove("drag");
            UploadArea.style.transform = "scale(1.2)";
        });

        UploadArea.addEventListener("dragleave", (e) => {
            UploadContainer.classList.remove("dragover");
            UploadContainer.classList.add("drag");
            UploadArea.style.transform = "scale(1)";
        });

        UploadArea.addEventListener("drop", (e) => {
            e.preventDefault();
            UploadArea.style.transform = "perspective(1000px) rotateX(15deg) scale(1)";
            setTimeout(() => {
                UploadArea.style.transform = "scale(1)";
            }, 1000);
            // console.log("files ===>> ", e.dataTransfer.files);
            //add file to input

            let allFiles = [...e.dataTransfer.files];
            console.log(allFiles);
            allFiles.map((item, idx) => {
                // UploadFile(e.dataTransfer.files[0]);
                // console.log(item);
                UploadFile(item);
            })
        });

        function SelectFile(){
            document.getElementById("upload").click();
        }

        function UploadFile(event){
            console.log(event.name);
            document.getElementById("Progess_Bar_Container").style.display = "block";
            $(".progress-bar").animate({
                width: "100%"
            }, 2500);
            $(".progress-bar").animate({
                width: "0%"
            }, 0);
            setTimeout(function(){
                document.getElementById("Progess_Bar_Container").style.display = "none";
                //document.querySelector(".progress-bar").style.width = "1%";
                UploadContainer.classList.remove("dragover");
                UploadContainer.classList.add("drag");
            }, 2500);
        }
