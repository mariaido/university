using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;
using System.Data.SqlClient;
using System.IO;


namespace ProjectETHBD
{
    public partial class Form1 : Form
    {
        SqlConnection connection;
        SqlDataAdapter DataAdapterPelatis, DataAdapterApothiki, DataAdapterParagelia, DataAdapterParageliesPelati, DataAdapterProionta;
        DataSet DataSetPelatis, DataSetApothiki, DataSetParagelia, DataSetParageliesPelati, DataSetProionta;
        BindingSource BindingSourcePelatis, BindingSourceApothiki, BindingSourceParagelia, BindingSourceParageliesPelati, BindingSourceProionta;
        DataTable DataTablePelatis, DataTableApothiki;

        public Form1()
        {
            InitializeComponent();
            connection = new SqlConnection("Data Source=IE8WIN7;Initial Catalog=APOTHIKI3748;Integrated Security=True");
            connection.Open();
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            this.aPOTHIKITableAdapter.Fill(this.aPOTHIKI3748DataSet.APOTHIKI);
            this.pELATISTableAdapter.Fill(this.aPOTHIKI3748DataSet.PELATIS);

            DataAdapterPelatis = new SqlDataAdapter("Select * From PELATIS", connection);
            DataSetPelatis = new DataSet();
            DataAdapterPelatis.Fill(DataSetPelatis, "PELATIS");
            BindingSourcePelatis = new BindingSource();
            BindingSourcePelatis.DataSource = DataSetPelatis.Tables[0].DefaultView;
            dataGridViewPelatis.DataSource = BindingSourcePelatis;
            bindingNavigatorPelati.BindingSource = BindingSourcePelatis;

            DataTablePelatis = new DataTable();
            DataAdapterPelatis.Fill(DataTablePelatis);
            comboBoxPelatis.DataSource = DataTablePelatis;
            comboBoxPelatis.DisplayMember = "EPONIMIA";

            DataAdapterApothiki = new SqlDataAdapter("Select * From APOTHIKI", connection);
            DataSetApothiki = new DataSet();
            DataAdapterApothiki.Fill(DataSetApothiki, "APOTHIKI");
            BindingSourceApothiki = new BindingSource();
            BindingSourceApothiki.DataSource = DataSetApothiki.Tables[0].DefaultView;
            dataGridViewApothiki.DataSource = BindingSourceApothiki;
            bindingNavigatorApothiki.BindingSource = BindingSourceApothiki;

            DataTableApothiki = new DataTable();
            DataAdapterApothiki.Fill(DataTableApothiki);
            comboBoxProionta.DataSource = DataTableApothiki;
            comboBoxProionta.DisplayMember = "IDOS";

            DataAdapterParagelia = new SqlDataAdapter("SELECT PARAGELIA.KOD_PAR, PROIONTA_PARAGELIAS.K_E, PARAGELIA.IMER_PARAGELIAS, PARAGELIA.K_PEL, PARAGELIA.TROPOS_PLIROMIS, PARAGELIA.TOPOS_PARADOSIS, PROIONTA_PARAGELIAS.POSOTITA FROM PARAGELIA INNER JOIN PROIONTA_PARAGELIAS ON PARAGELIA.KOD_PAR = PROIONTA_PARAGELIAS.K_PAR INNER JOIN APOTHIKI ON PROIONTA_PARAGELIAS.K_E = APOTHIKI.KE", connection);
            DataSetParagelia = new DataSet();
            DataAdapterParagelia.Fill(DataSetParagelia, "PARAGELIA");
            BindingSourceParagelia = new BindingSource();
            BindingSourceParagelia.DataSource = DataSetParagelia.Tables[0].DefaultView;
            dataGridViewParagelia.DataSource = BindingSourceParagelia;
            bindingNavigatorParagelia.BindingSource = BindingSourceParagelia;

            this.reportViewer1.RefreshReport();
            this.reportViewer2.RefreshReport();
        }

        public void fillDataSetParageliesPelati()
        {
            DataAdapterParageliesPelati = new SqlDataAdapter("Select EPONIMIA, AFM, IDOS, KATIGORIA, TIMI_POLISIS, FPA, POSOTITA, (TIMI_POLISIS * POSOTITA * FPA / 100 + (TIMI_POLISIS * POSOTITA)) as TELIKI_TIMI From PELATIS Inner join PARAGELIA on PELATIS.KOD_PELATI = PARAGELIA.K_PEL Inner join PROIONTA_PARAGELIAS on PARAGELIA.KOD_PAR = PROIONTA_PARAGELIAS.K_PAR Inner join APOTHIKI on PROIONTA_PARAGELIAS.K_E = APOTHIKI.KE Where PELATIS.EPONIMIA = N'"+comboBoxPelatis.Text.ToString()+"'", connection);
            DataSetParageliesPelati = new DataSet();
            DataAdapterParageliesPelati.Fill(DataSetParageliesPelati);
            BindingSourceParageliesPelati = new BindingSource();
            BindingSourceParageliesPelati.DataSource = DataSetParageliesPelati.Tables[0].DefaultView;
            dataGridView1.DataSource = BindingSourceParageliesPelati;

            double sum = 0;
            for (int i = 0; i < dataGridView1.RowCount; i++)
            {
                sum += Convert.ToDouble(dataGridView1.Rows[i].Cells[7].Value);
            }

            labelSum.Text = sum.ToString();
        }

        private void comboBoxPelatis_SelectedIndexChanged(object sender, EventArgs e)
        {
            fillDataSetParageliesPelati();
        }

        public void fillDataSetProionta()
        {
            DataAdapterProionta = new SqlDataAdapter("select KOD_PAR, IDOS, IMER_PARAGELIAS, K_PEL, POSOTITA, TIMI_POLISIS, FPA, ((POSOTITA * TIMI_POLISIS) * FPA/100 + (POSOTITA * TIMI_POLISIS)) as TELIKI_TIMI from PARAGELIA inner join PROIONTA_PARAGELIAS on KOD_PAR = K_PAR inner join APOTHIKI on K_E = KE where IDOS = N'" + comboBoxProionta.Text.ToString() + "'", connection);
            DataSetProionta = new DataSet();
            DataAdapterProionta.Fill(DataSetProionta);
            BindingSourceProionta = new BindingSource();
            BindingSourceProionta.DataSource = DataSetProionta.Tables[0].DefaultView;
            dataGridView2.DataSource = BindingSourceProionta;

            double sum = 0;
            for (int i = 0; i < dataGridView2.RowCount; i++)
            {
                sum += Convert.ToDouble(dataGridView2.Rows[i].Cells[7].Value);
            }

            labelSum2.Text = sum.ToString();
        }

        private void comboBoxProionta_SelectedIndexChanged_1(object sender, EventArgs e)
        {
            fillDataSetProionta();
        }

        public void refreshImagePelati()
        {
            int img = Convert.ToInt32(bindingNavigatorPositionItem.Text) - 1;
            if (img >= 0)
            {
                String imgPath = Convert.ToString(dataGridViewPelatis.Rows[img].Cells[11].Value);
                if (imgPath != "" && File.Exists(imgPath))
                {
                    pictureBoxPelati.Image = Image.FromFile(imgPath);
                }
                else 
                {
                    pictureBoxPelati.Image = Image.FromFile(@"Images\NoImageAvailable.jpg");
                          
                }
            }
        }

        public void refreshImageApothiki()
        {
            int img = Convert.ToInt32(bindingNavigatorPositionItem1.Text) - 1;
            if (img >= 0)
            {
                String imgPath = Convert.ToString(dataGridViewApothiki.Rows[img].Cells[6].Value);
                if (imgPath != "" && File.Exists(imgPath))
                {
                    pictureBoxApothiki.Image = Image.FromFile(imgPath);
                }
                else
                {
                    pictureBoxApothiki.Image = Image.FromFile(@"Images\NoImageAvailable.jpg");

                }
            }
        }

        private void bindingNavigatorPelati_RefreshItems(object sender, EventArgs e)
        {
            refreshImagePelati();
        }

        private void bindingNavigatorApothiki_RefreshItems(object sender, EventArgs e)
        {
            refreshImageApothiki();
        }

        private void buttonUpdateImage_Click(object sender, EventArgs e)
        {
            int img = Convert.ToInt32(bindingNavigatorPositionItem.Text) - 1;
            if (openFileDialog1.ShowDialog() == DialogResult.OK && img >= 0)
            {
                String imgPath = openFileDialog1.InitialDirectory + openFileDialog1.FileName;
                dataGridViewPelatis.Rows[img].Cells[11].Value = imgPath;
                refreshImagePelati();
            }
        }

        private void buttonUpdateImage2_Click(object sender, EventArgs e)
        {
            int img = Convert.ToInt32(bindingNavigatorPositionItem1.Text) - 1;
            if (openFileDialog1.ShowDialog() == DialogResult.OK && img >= 0)
            {
                String imgPath = openFileDialog1.InitialDirectory + openFileDialog1.FileName;
                dataGridViewApothiki.Rows[img].Cells[6].Value = imgPath;
                refreshImageApothiki();
            }
        }
       

        private void toolStripButtonSavePelatis_Click(object sender, EventArgs e)
        {
            using (new SqlCommandBuilder(DataAdapterPelatis))
            {
                DataAdapterPelatis.Update(DataSetPelatis, "PELATIS");
            }

            MessageBox.Show("Ο πίνακας ΠΕΛΑΤΗΣ ενημερώθηκε!");
        }

        private void toolStripButtonSaveApothiki_Click(object sender, EventArgs e)
        {
            using (new SqlCommandBuilder(DataAdapterApothiki))
            {
                DataAdapterApothiki.Update(DataSetApothiki, "APOTHIKI");
            }

            MessageBox.Show("Ο πίνακας ΑΠΟΘΗΚΗ ενημερώθηκε!");
        }

        private void toolStripButtonSaveParagelia_Click(object sender, EventArgs e)
        {
            using (new SqlCommandBuilder(DataAdapterParagelia))
            {
                DataAdapterParagelia.Update(DataSetParagelia, "PARAGELIA");
            }

            MessageBox.Show("Ο πίνακας ΠΑΡΑΓΓΕΛΙΑ ενημερώθηκε!");
        }

        private void saveAllToolStripMenuItem_Click(object sender, EventArgs e)
        {
            toolStripButtonSavePelatis_Click( sender,  e);
            toolStripButtonSaveApothiki_Click( sender,  e);
            toolStripButtonSaveParagelia_Click( sender,  e);
        }       
    }
}
