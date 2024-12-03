// Kiểm tra điều kiện xét duyệt
function checkApproval() {
    const semester1 = parseFloat(document.getElementById("semester1").value) || 0;
    const semester2 = parseFloat(document.getElementById("semester2").value) || 0;

    const diemTrungBinh = (semester1 + semester2) / 2;
    document.getElementById("diemTrungBinh").textContent = `Điểm trung bình: ${diemTrungBinh.toFixed(2)}`;

    const conduct = diemTrungBinh >= 8 ? "Tốt" : diemTrungBinh >= 5 ? "Khá" : "Trung bình";
    document.getElementById("conduct").value = conduct;

    const academicPerformance =
        diemTrungBinh >= 8 ? "Giỏi" :
        diemTrungBinh >= 6.5 ? "Khá" :
        diemTrungBinh >= 5 ? "Trung bình" : "Yếu";
    document.getElementById("academicPerformance").value = academicPerformance;

    const approvalResult = document.getElementById("approvalResult");
    if (diemTrungBinh >= 5 && ["tốt", "khá"].includes(conduct.toLowerCase())) {
        approvalResult.textContent = "Đủ điều kiện xét lên lớp hoặc tốt nghiệp.";
        approvalResult.className = "approval-result success";
    } else {
        approvalResult.textContent = "Không đủ điều kiện xét lên lớp hoặc tốt nghiệp.";
        approvalResult.className = "approval-result failure";
    }
}

// Tạo tên đăng nhập và mật khẩu
function generateUsername(fullname, yearOfBirth) {
    return fullname.toLowerCase().replace(/\s+/g, "").normalize("NFD").replace(/[\u0300-\u036f]/g, "") + yearOfBirth;
}

function generatePassword() {
    const chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return Array.from({ length: 8 }, () => chars[Math.floor(Math.random() * chars.length)]).join("");
}

// Lưu thông tin học sinh
function saveStudentInfo() {
    const fullname = document.getElementById("fullname").value.trim();
    const age = document.getElementById("age").value.trim();
    const yearOfBirth = document.getElementById("yearOfBirth").value.trim();
    const className = document.getElementById("class").value.trim();
    const semester1 = parseFloat(document.getElementById("semester1").value) || 0;
    const semester2 = parseFloat(document.getElementById("semester2").value) || 0;
    const diemTrungBinh = (semester1 + semester2) / 2;
    const conduct = document.getElementById("conduct").value;
    const academicPerformance = document.getElementById("academicPerformance").value;

    const username = generateUsername(fullname, yearOfBirth);
    const password = generatePassword();

    let studentList = JSON.parse(localStorage.getItem("students")) || [];
    if (studentList.some(student => student.username === username)) {
        alert("Tên đăng nhập đã tồn tại. Vui lòng kiểm tra lại thông tin.");
        return;
    }

    const student = { fullname, age, yearOfBirth, class: className, semester1, semester2, diemTrungBinh: diemTrungBinh.toFixed(2), conduct, academicPerformance, username, password };

    studentList.push(student);
    localStorage.setItem("students", JSON.stringify(studentList));

    alert(`Tài khoản của học sinh đã được tạo thành công!\nTên đăng nhập: ${username}\nMật khẩu: ${password}`);

    const studentListLink = document.createElement("a");
    studentListLink.href = "danhsachhocsinh.html";
    studentListLink.textContent = "Xem danh sách học sinh";
    studentListLink.style.display = "block";
    studentListLink.style.marginTop = "5px";
    document.getElementById("approvalResult").appendChild(studentListLink);
}

document.querySelector("button[type='button']").addEventListener("click", function () {
    checkApproval();
    saveStudentInfo();
});
