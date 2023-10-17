import tkinter as tk
from tkinter import ttk

pegawai_list = []

class Pegawai:
    def __init__(self, nama, gaji):
        self.nama = nama
        self.gaji = gaji

    def info(self):
        return f'Nama: {self.nama}, Gaji: {self.gaji}'


class PegawaiTetap(Pegawai):
    def __init__(self, nama, gaji, bonus):
        super().__init__(nama, gaji)
        self.bonus = bonus

    def info(self):
        return f'Pegawai Tetap - {super().info()}, Bonus: {self.bonus}'


class PegawaiHarian(Pegawai):
    def __init__(self, nama, gaji, jam_kerja):
        super().__init__(nama, gaji)
        self.jam_kerja = jam_kerja

    def info(self):
        return f'Pegawai Harian - {super().info()}, Jam Kerja: {self.jam_kerja}'


class PegawaiKontrak(Pegawai):
    def __init__(self, nama, gaji, durasi):
        super().__init__(nama, gaji)
        self.durasi = durasi

    def info(self):
        return f'Pegawai Kontrak - {super().info()}, Durasi Kontrak: {self.durasi} bulan'


def create_pegawai():
    jenis_pegawai = combo.get()
    nama = nama_entry.get()
    gaji = float(gaji_entry.get())
    info = ""

    if jenis_pegawai == "Pegawai Tetap":
        bonus = float(bonus_entry.get())
        pegawai = PegawaiTetap(nama, gaji, bonus)
        info = pegawai.info()
    elif jenis_pegawai == "Pegawai Harian":
        jam_kerja = float(jam_kerja_entry.get())
        pegawai = PegawaiHarian(nama, gaji, jam_kerja)
        info = pegawai.info()
    else:
        durasi = int(durasi_entry.get())
        pegawai = PegawaiKontrak(nama, gaji, durasi)
        info = pegawai.info()

    pegawai_list.append(info)
    update_table()


def update_table():
    for i in tree.get_children():
        tree.delete(i)
    for idx, pegawai in enumerate(pegawai_list, start=1):
        tree.insert("", "end", values=(idx, pegawai))


app = tk.Tk()
app.title("Sistem Informasi Pegawai")

jenis_label = tk.Label(app, text="Pilih jenis pegawai:")
jenis_label.pack()

jenis_pegawai = ["Pegawai Tetap", "Pegawai Harian", "Pegawai Kontrak"]
combo = tk.StringVar()
combo.set(jenis_pegawai[0])
jenis_option = tk.OptionMenu(app, combo, *jenis_pegawai)
jenis_option.pack()

nama_label = tk.Label(app, text="Nama:")
nama_label.pack()
nama_entry = tk.Entry(app)
nama_entry.pack()

gaji_label = tk.Label(app, text="Gaji:")
gaji_label.pack()
gaji_entry = tk.Entry(app)
gaji_entry.pack()

bonus_label = tk.Label(app, text="Bonus:")
bonus_label.pack()
bonus_entry = tk.Entry(app)
bonus_entry.pack()

jam_kerja_label = tk.Label(app, text="Jam Kerja:")
jam_kerja_label.pack()
jam_kerja_entry = tk.Entry(app)
jam_kerja_entry.pack()

durasi_label = tk.Label(app, text="Durasi Kontrak (bulan):")
durasi_label.pack()
durasi_entry = tk.Entry(app)
durasi_entry.pack()

create_button = tk.Button(app, text="Buat Pegawai", command=create_pegawai)
create_button.pack()

tree = ttk.Treeview(app, columns=("No.", "Info"), show="headings")
tree.heading("No.", text="No.")
tree.heading("Info", text="Info")
tree.column("No.", anchor="w", width=50)
tree.column("Info", anchor="w", width=400)  
tree.pack()

app.mainloop()
