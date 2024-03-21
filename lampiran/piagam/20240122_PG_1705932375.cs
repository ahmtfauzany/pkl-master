using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Surat
{
    #region Tbl_cuti
    public class Tbl_cuti
    {
        #region Member Variables
        protected int _id_cuti;
        protected string _id_sm;
        protected int _id_pegawai;
        protected string _alasan;
        protected string _keterangan;
        protected string _tgl_awal;
        protected string _tgl_akhir;
        protected string _lama;
        protected string _token_lampiran;
        protected int _id_user;
        #endregion
        #region Constructors
        public Tbl_cuti() { }
        public Tbl_cuti(string id_sm, int id_pegawai, string alasan, string keterangan, string tgl_awal, string tgl_akhir, string lama, string token_lampiran, int id_user)
        {
            this._id_sm=id_sm;
            this._id_pegawai=id_pegawai;
            this._alasan=alasan;
            this._keterangan=keterangan;
            this._tgl_awal=tgl_awal;
            this._tgl_akhir=tgl_akhir;
            this._lama=lama;
            this._token_lampiran=token_lampiran;
            this._id_user=id_user;
        }
        #endregion
        #region Public Properties
        public virtual int Id_cuti
        {
            get {return _id_cuti;}
            set {_id_cuti=value;}
        }
        public virtual string Id_sm
        {
            get {return _id_sm;}
            set {_id_sm=value;}
        }
        public virtual int Id_pegawai
        {
            get {return _id_pegawai;}
            set {_id_pegawai=value;}
        }
        public virtual string Alasan
        {
            get {return _alasan;}
            set {_alasan=value;}
        }
        public virtual string Keterangan
        {
            get {return _keterangan;}
            set {_keterangan=value;}
        }
        public virtual string Tgl_awal
        {
            get {return _tgl_awal;}
            set {_tgl_awal=value;}
        }
        public virtual string Tgl_akhir
        {
            get {return _tgl_akhir;}
            set {_tgl_akhir=value;}
        }
        public virtual string Lama
        {
            get {return _lama;}
            set {_lama=value;}
        }
        public virtual string Token_lampiran
        {
            get {return _token_lampiran;}
            set {_token_lampiran=value;}
        }
        public virtual int Id_user
        {
            get {return _id_user;}
            set {_id_user=value;}
        }
        #endregion
    }
    #endregion
}