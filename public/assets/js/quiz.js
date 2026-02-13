document.addEventListener("DOMContentLoaded", () => {

    const btnQuiz = document.querySelector(".quiz-trigger");
    const modal = document.getElementById("quizModal");
    const retryBtn = document.querySelector(".quiz-retry");
    const closeBtn = document.querySelector(".quiz-close");

    if (!btnQuiz || !modal) return;

    /* ===== BUKA MODAL ===== */
    btnQuiz.addEventListener("click", () => {
        modal.classList.add("active");
    });

    /* ===== KLIK BACKDROP = REFRESH ===== */
    modal.addEventListener("click", (e) => {
        if (e.target === modal) {
            window.location.reload();
        }
    });

    /* ===== TUTUP = REFRESH ===== */
    if (closeBtn) {
        closeBtn.addEventListener("click", () => {
            window.location.reload();
        });
    }

    /* ===== LOGIKA KUIS ===== */
    const container = document.querySelector(".quiz-options");
    if (!container) return;

    const correct = container.dataset.correct;
    const alatId = container.dataset.id;
    const tipeSoal = container.dataset.tipe;

    const buttons = container.querySelectorAll(".quiz-choice");
    const feedback = document.getElementById("quiz-feedback");

    let answered = false;

    buttons.forEach(btn => {
        btn.addEventListener("click", () => {

            if (answered) return;
            answered = true;

            const val = btn.dataset.value;
            const isCorrect = val === correct;

            buttons.forEach(b => b.disabled = true);

            if (isCorrect) {
                btn.classList.add("correct");
                feedback.textContent = "✅ Jawaban benar";
            } else {
                btn.classList.add("wrong");
                feedback.textContent = "❌ Salah. Jawaban benar: " + correct;

                buttons.forEach(b => {
                    if (b.dataset.value === correct) {
                        b.classList.add("correct");
                    }
                });
            }

            /* ===== SIMPAN KE DATABASE ===== */
            fetch('/quiz/submit', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute('content')
                },
                body: JSON.stringify({
                    alat_musik_id: alatId,
                    tipe_soal: tipeSoal,
                    is_correct: isCorrect
                })
            })
                .then(res => res.json())
                .then(data => {

                    const scoreBox = document.getElementById("scoreBox");

                    if (scoreBox) {
                        scoreBox.innerText = "Skor: " + data.score;
                    }

                })
                .catch(err => {
                    console.error("Error simpan kuis:", err);
                });


        });
    });

    /* ===== COBA LAGI (RESET TANPA RELOAD) ===== */
    if (retryBtn) {
        retryBtn.addEventListener("click", () => {
            answered = false;
            feedback.textContent = "";

            buttons.forEach(b => {
                b.disabled = false;
                b.classList.remove("correct", "wrong");
            });
        });
    }

});
