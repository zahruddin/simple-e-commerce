#include <GL/glut.h>

void display() {
    // Membersihkan layar
    glClear(GL_COLOR_BUFFER_BIT);

    // Menggambar segitiga
    glBegin(GL_TRIANGLES);
        glColor3f(1.0, 0.0, 0.0); // Merah
        glVertex2f(0.0, 1.0);

        glColor3f(0.0, 1.0, 0.0); // Hijau
        glVertex2f(-1.0, -1.0);

        glColor3f(0.0, 0.0, 1.0); // Biru
        glVertex2f(1.0, -1.0);
    glEnd();

    // Memproses perintah-perintah OpenGL
    glFlush();
}

int main(int argc, char** argv) {
    // Inisialisasi GLUT
    glutInit(&argc, argv);

    // Menentukan mode display dan inisialisasi jendela
    glutInitDisplayMode(GLUT_SINGLE | GLUT_RGB);
    glutInitWindowSize(400, 400);
    glutCreateWindow("Contoh OpenGL");

    // Menentukan fungsi display yang akan dijalankan
    glutDisplayFunc(display);

    // Menentukan warna latar belakang
    glClearColor(1.0, 1.0, 1.0, 1.0); // Putih

    // Memulai loop pengolahan peristiwa GLUT
    glutMainLoop();

    return 0;
}
