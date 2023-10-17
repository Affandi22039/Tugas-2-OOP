#include <iostream>
#include <string>
#include <cmath>

using namespace std;

class BangunDatar {
public:
    virtual double hitungLuas() {
        return 0.0;
    }
};

class Persegi : public BangunDatar {
private:
    double sisi;

public:
    Persegi(double s) : sisi(s) {}

    double hitungLuas() {
        return sisi * sisi;
    }
};

class PersegiPanjang : public BangunDatar {
private:
    double panjang;
    double lebar;

public:
    PersegiPanjang(double p, double l) : panjang(p), lebar(l) {}

    double hitungLuas() {
        return panjang * lebar;
    }
};

class Segitiga : public BangunDatar {
private:
    double alas;
    double tinggi;

public:
    Segitiga(double a, double t) : alas(a), tinggi(t) {}

    double hitungLuas() {
        return 0.5 * alas * tinggi;
    }
};

class Lingkaran : public BangunDatar {
private:
    double jariJari;

public:
    Lingkaran(double r) : jariJari(r) {}

    double hitungLuas() {
        return 3.14159265359 * jariJari * jariJari;
    }
};

int main() {
    cout << "Kalkulator Luas Bangun Datar" << endl;
    cout << "Pilih bentuk:" << endl;
    cout << "1. Persegi" << endl;
    cout << "2. Persegi Panjang" << endl;
    cout << "3. Segitiga" << endl;
    cout << "4. Lingkaran" << endl;

    int pilihan;
    cin >> pilihan;

    double panjang, lebar, alas, tinggi, jariJari;

    switch (pilihan) {
        case 1: { // Persegi
            cout << "Masukkan panjang sisi: ";
            cin >> panjang;
            Persegi persegi(panjang);
            cout << "Luas Persegi: " << persegi.hitungLuas() << endl;
            break;
        }
        case 2: { // Persegi Panjang
            cout << "Masukkan panjang: ";
            cin >> panjang;
            cout << "Masukkan lebar: ";
            cin >> lebar;
            PersegiPanjang persegipanjang(panjang, lebar);
            cout << "Luas Persegi Panjang: " << persegipanjang.hitungLuas() << endl;
            break;
        }
        case 3: { // Segitiga
            cout << "Masukkan alas: ";
            cin >> alas;
            cout << "Masukkan tinggi: ";
            cin >> tinggi;
            Segitiga segitiga(alas, tinggi);
            cout << "Luas Segitiga: " << segitiga.hitungLuas() << endl;
            break;
        }
        case 4: { // Lingkaran
            cout << "Masukkan jari-jari: ";
            cin >> jariJari;
            Lingkaran lingkaran(jariJari);
            cout << "Luas Lingkaran: " << lingkaran.hitungLuas() << endl;
            break;
        }
        default:
            cout << "Pilihan tidak valid." << endl;
    }

    return 0;
}
