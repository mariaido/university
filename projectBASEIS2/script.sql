USE [master]
GO
/****** Object:  Database [APOTHIKI3748]    Script Date: 5/28/2016 3:53:00 PM ******/
IF NOT EXISTS (SELECT name FROM sys.databases WHERE name = N'APOTHIKI3748')
BEGIN
CREATE DATABASE [APOTHIKI3748]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'APOTHIKI3748', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL11.MSSQLSERVER\MSSQL\DATA\APOTHIKI3748.mdf' , SIZE = 5120KB , MAXSIZE = UNLIMITED, FILEGROWTH = 1024KB )
 LOG ON 
( NAME = N'APOTHIKI3748_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL11.MSSQLSERVER\MSSQL\DATA\APOTHIKI3748_log.ldf' , SIZE = 1024KB , MAXSIZE = 2048GB , FILEGROWTH = 10%)
 COLLATE SQL_Latin1_General_CP1_CI_AS
END

GO
ALTER DATABASE [APOTHIKI3748] SET COMPATIBILITY_LEVEL = 110
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [APOTHIKI3748].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [APOTHIKI3748] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [APOTHIKI3748] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [APOTHIKI3748] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [APOTHIKI3748] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [APOTHIKI3748] SET ARITHABORT OFF 
GO
ALTER DATABASE [APOTHIKI3748] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [APOTHIKI3748] SET AUTO_CREATE_STATISTICS ON 
GO
ALTER DATABASE [APOTHIKI3748] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [APOTHIKI3748] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [APOTHIKI3748] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [APOTHIKI3748] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [APOTHIKI3748] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [APOTHIKI3748] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [APOTHIKI3748] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [APOTHIKI3748] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [APOTHIKI3748] SET  DISABLE_BROKER 
GO
ALTER DATABASE [APOTHIKI3748] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [APOTHIKI3748] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [APOTHIKI3748] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [APOTHIKI3748] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [APOTHIKI3748] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [APOTHIKI3748] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [APOTHIKI3748] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [APOTHIKI3748] SET RECOVERY FULL 
GO
ALTER DATABASE [APOTHIKI3748] SET  MULTI_USER 
GO
ALTER DATABASE [APOTHIKI3748] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [APOTHIKI3748] SET DB_CHAINING OFF 
GO
ALTER DATABASE [APOTHIKI3748] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [APOTHIKI3748] SET TARGET_RECOVERY_TIME = 0 SECONDS 
GO
EXEC sys.sp_db_vardecimal_storage_format N'APOTHIKI3748', N'ON'
GO
ALTER DATABASE [APOTHIKI3748] SET CHANGE_TRACKING = ON (CHANGE_RETENTION = 2 DAYS,AUTO_CLEANUP = ON)
GO
ALTER AUTHORIZATION ON DATABASE::[APOTHIKI3748] TO [IE8Win7\IEUser]
GO
USE [APOTHIKI3748]
GO
/****** Object:  Table [dbo].[APOTHIKI]    Script Date: 5/28/2016 3:53:00 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[APOTHIKI]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[APOTHIKI](
	[KE] [int] IDENTITY(1,1) NOT NULL,
	[IDOS] [nvarchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[KATIGORIA] [nvarchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[APOTHEMA] [int] NULL,
	[TIMI_POLISIS] [money] NULL,
	[FPA] [real] NULL,
 CONSTRAINT [PK_APOTHIKI] PRIMARY KEY CLUSTERED 
(
	[KE] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
ALTER TABLE [dbo].[APOTHIKI] ENABLE CHANGE_TRACKING WITH(TRACK_COLUMNS_UPDATED = OFF)
GO
ALTER AUTHORIZATION ON [dbo].[APOTHIKI] TO  SCHEMA OWNER 
GO
/****** Object:  Table [dbo].[PARAGELIA]    Script Date: 5/28/2016 3:53:00 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[PARAGELIA]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[PARAGELIA](
	[KOD_PAR] [int] IDENTITY(1,1) NOT NULL,
	[IMER_PARAGELIAS] [smalldatetime] NULL,
	[K_PEL] [int] NULL,
	[TROPOS_PLIROMIS] [nvarchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[TOPOS_PARADOSIS] [nvarchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
 CONSTRAINT [PK_PARAGELIA] PRIMARY KEY CLUSTERED 
(
	[KOD_PAR] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
ALTER TABLE [dbo].[PARAGELIA] ENABLE CHANGE_TRACKING WITH(TRACK_COLUMNS_UPDATED = OFF)
GO
ALTER AUTHORIZATION ON [dbo].[PARAGELIA] TO  SCHEMA OWNER 
GO
/****** Object:  Table [dbo].[PELATIS]    Script Date: 5/28/2016 3:53:00 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[PELATIS]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[PELATIS](
	[KOD_PELATI] [int] IDENTITY(1,1) NOT NULL,
	[EPONIMIA] [nvarchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[EPITHETO] [nvarchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[ONOMA] [nvarchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[IM_GENISIS] [datetime] NULL,
	[ILIKIA] [int] NULL,
	[AFM] [nvarchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[DOI] [nvarchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[DIEUTHINSI] [nvarchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[POLI] [nvarchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[TIL] [nvarchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[FOTO] [varchar](255) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	[SXOLIA] [nvarchar](50) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
 CONSTRAINT [PK_Table_1] PRIMARY KEY CLUSTERED 
(
	[KOD_PELATI] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
ALTER TABLE [dbo].[PELATIS] ENABLE CHANGE_TRACKING WITH(TRACK_COLUMNS_UPDATED = OFF)
GO
SET ANSI_PADDING OFF
GO
ALTER AUTHORIZATION ON [dbo].[PELATIS] TO  SCHEMA OWNER 
GO
/****** Object:  Table [dbo].[PROIONTA_PARAGELIAS]    Script Date: 5/28/2016 3:53:00 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[PROIONTA_PARAGELIAS]') AND type in (N'U'))
BEGIN
CREATE TABLE [dbo].[PROIONTA_PARAGELIAS](
	[K_PAR] [int] NOT NULL,
	[K_E] [int] NOT NULL,
	[POSOTITA] [float] NULL,
 CONSTRAINT [PK_PROIONTA_PARAGELIAS] PRIMARY KEY CLUSTERED 
(
	[K_PAR] ASC,
	[K_E] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
END
GO
ALTER TABLE [dbo].[PROIONTA_PARAGELIAS] ENABLE CHANGE_TRACKING WITH(TRACK_COLUMNS_UPDATED = OFF)
GO
ALTER AUTHORIZATION ON [dbo].[PROIONTA_PARAGELIAS] TO  SCHEMA OWNER 
GO
SET IDENTITY_INSERT [dbo].[APOTHIKI] ON 

INSERT [dbo].[APOTHIKI] ([KE], [IDOS], [KATIGORIA], [APOTHEMA], [TIMI_POLISIS], [FPA]) VALUES (1, N'ΓΑΛΑ', N'ΓΑΛΑΚΤΟΚΟΜΙΚΑ', 512, 1.0000, 23)
INSERT [dbo].[APOTHIKI] ([KE], [IDOS], [KATIGORIA], [APOTHEMA], [TIMI_POLISIS], [FPA]) VALUES (2, N'ΚΑΣΕΡΙ', N'ΓΑΛΑΚΤΟΚΟΜΙΚΑ', 428, 13.0000, 23)
INSERT [dbo].[APOTHIKI] ([KE], [IDOS], [KATIGORIA], [APOTHEMA], [TIMI_POLISIS], [FPA]) VALUES (3, N'ΓΙΑΟΥΡΤΙ', N'ΓΑΛΑΚΤΟΚΟΜΙΚΑ', 300, 3.0000, 23)
INSERT [dbo].[APOTHIKI] ([KE], [IDOS], [KATIGORIA], [APOTHEMA], [TIMI_POLISIS], [FPA]) VALUES (4, N'ΓΡΑΦΕΙΟ', N'ΕΙΔΗ ΓΡΑΦΕΙΟΥ', 150, 70.0000, 23)
INSERT [dbo].[APOTHIKI] ([KE], [IDOS], [KATIGORIA], [APOTHEMA], [TIMI_POLISIS], [FPA]) VALUES (5, N'ΚΑΡΕΚΛΑ', N'ΕΙΔΗ ΓΡΑΦΕΙΟΥ', 200, 90.0000, 23)
INSERT [dbo].[APOTHIKI] ([KE], [IDOS], [KATIGORIA], [APOTHEMA], [TIMI_POLISIS], [FPA]) VALUES (6, N'ΟΘΟΝΗ', N'ΗΛΕΚΤΡΟΛΟΓΙΚΑ', 50, 450.0000, 23)
INSERT [dbo].[APOTHIKI] ([KE], [IDOS], [KATIGORIA], [APOTHEMA], [TIMI_POLISIS], [FPA]) VALUES (7, N'ΤΗΛΕΟΡΑΣΗ', N'ΗΛΕΚΤΡΟΛΟΓΙΚΑ', 15, 760.0000, 23)
SET IDENTITY_INSERT [dbo].[APOTHIKI] OFF
SET IDENTITY_INSERT [dbo].[PARAGELIA] ON 

INSERT [dbo].[PARAGELIA] ([KOD_PAR], [IMER_PARAGELIAS], [K_PEL], [TROPOS_PLIROMIS], [TOPOS_PARADOSIS]) VALUES (1, CAST(0xA5DE0387 AS SmallDateTime), 1, N'ΤΙΜΟΛΟΓΙΟ', N'ΑΠΟΘΗΚΗ')
INSERT [dbo].[PARAGELIA] ([KOD_PAR], [IMER_PARAGELIAS], [K_PEL], [TROPOS_PLIROMIS], [TOPOS_PARADOSIS]) VALUES (2, CAST(0xA5DF02FD AS SmallDateTime), 2, N'ΤΙΜΟΛΟΓΙΟ', N'ΑΠΟΘΗΚΗ')
INSERT [dbo].[PARAGELIA] ([KOD_PAR], [IMER_PARAGELIAS], [K_PEL], [TROPOS_PLIROMIS], [TOPOS_PARADOSIS]) VALUES (3, CAST(0xA5E8042D AS SmallDateTime), 5, N'ΤΙΜΟΛΟΓΙΟ', N'ΑΠΟΘΗΚΗ')
INSERT [dbo].[PARAGELIA] ([KOD_PAR], [IMER_PARAGELIAS], [K_PEL], [TROPOS_PLIROMIS], [TOPOS_PARADOSIS]) VALUES (4, CAST(0xA5F1035F AS SmallDateTime), 3, N'ΤΙΜΟΛΟΓΙΟ', N'ΑΠΟΘΗΚΗ')
INSERT [dbo].[PARAGELIA] ([KOD_PAR], [IMER_PARAGELIAS], [K_PEL], [TROPOS_PLIROMIS], [TOPOS_PARADOSIS]) VALUES (5, CAST(0xA5F103A2 AS SmallDateTime), 4, N'ΤΙΜΟΛΟΓΙΟ', N'ΑΠΟΘΗΚΗ')
INSERT [dbo].[PARAGELIA] ([KOD_PAR], [IMER_PARAGELIAS], [K_PEL], [TROPOS_PLIROMIS], [TOPOS_PARADOSIS]) VALUES (6, CAST(0xA5F9032E AS SmallDateTime), 3, N'ΤΙΜΟΛΟΓΙΟ', N'ΑΠΟΘΗΚΗ')
INSERT [dbo].[PARAGELIA] ([KOD_PAR], [IMER_PARAGELIAS], [K_PEL], [TROPOS_PLIROMIS], [TOPOS_PARADOSIS]) VALUES (7, CAST(0xA608035E AS SmallDateTime), 2, N'ΤΙΜΟΛΟΓΙΟ', N'ΑΠΟΘΗΚΗ')
SET IDENTITY_INSERT [dbo].[PARAGELIA] OFF
SET IDENTITY_INSERT [dbo].[PELATIS] ON 

INSERT [dbo].[PELATIS] ([KOD_PELATI], [EPONIMIA], [EPITHETO], [ONOMA], [IM_GENISIS], [ILIKIA], [AFM], [DOI], [DIEUTHINSI], [POLI], [TIL], [FOTO], [SXOLIA]) VALUES (1, N'ΓΕΩΡΓΙΟΥ ΑΕ', N'ΓΕΩΡΓΙΟΥ', N'ΚΩΣΤΑΣ', CAST(0x00008C3000000000 AS DateTime), 18, N'000986675546', N'ΘΕΣΣΑΛΟΝΙΚΗΣ', N'ΣΤΡΑΤΟΥ 8', N'ΘΕΣΣΑΛΟΝΙΚΗ', N'2310998767', NULL, NULL)
INSERT [dbo].[PELATIS] ([KOD_PELATI], [EPONIMIA], [EPITHETO], [ONOMA], [IM_GENISIS], [ILIKIA], [AFM], [DOI], [DIEUTHINSI], [POLI], [TIL], [FOTO], [SXOLIA]) VALUES (2, N'ΠΑΠΑΔΟΠΟΥΛΟΥ ΑΕ', N'ΠΑΠΑΔΟΠΟΥΛΟΣ', N'ΝΙΚΟΣ', CAST(0x000051B000000000 AS DateTime), 59, N'009998747478', N'ΘΕΣΣΑΛΟΝΙΚΗΣ', N'ΕΓΝΑΤΙΑΣ 32', N'ΘΕΣΣΑΛΟΝΙΚΗ', N'2310994959', NULL, NULL)
INSERT [dbo].[PELATIS] ([KOD_PELATI], [EPONIMIA], [EPITHETO], [ONOMA], [IM_GENISIS], [ILIKIA], [AFM], [DOI], [DIEUTHINSI], [POLI], [TIL], [FOTO], [SXOLIA]) VALUES (3, N'ΧΑΤΖΗΘΕΩΔΟΡΟΥ ΑΕ', N'ΧΑΤΖΗΘΕΩΔΟΡΟΥ', N'ΜΑΡΙΑ', CAST(0x0000866F00000000 AS DateTime), 22, N'119933223888', N'ΘΕΣΣΑΛΟΝΙΚΗΣ', N'΄ΛΑΜΠΡΑΚΗ 128', N'ΘΕΣΣΑΛΟΝΙΚΗ', N'2310449938', NULL, NULL)
INSERT [dbo].[PELATIS] ([KOD_PELATI], [EPONIMIA], [EPITHETO], [ONOMA], [IM_GENISIS], [ILIKIA], [AFM], [DOI], [DIEUTHINSI], [POLI], [TIL], [FOTO], [SXOLIA]) VALUES (4, N'ΠΡΟΔΡΟΜΟΥ ΑΕ', N'ΠΡΟΔΡΟΜΟΥ', N'ΦΩΤΕΙΝΗ', CAST(0x000076B300000000 AS DateTime), 33, N'122223388278', N'ΘΕΣΣΑΛΟΝΙΚΗΣ', N'ΑΓΙΑΣ ΣΟΦΙΑΣ 64', N'ΘΕΣΣΑΛΟΝΙΚΗ', N'2310444531', NULL, NULL)
INSERT [dbo].[PELATIS] ([KOD_PELATI], [EPONIMIA], [EPITHETO], [ONOMA], [IM_GENISIS], [ILIKIA], [AFM], [DOI], [DIEUTHINSI], [POLI], [TIL], [FOTO], [SXOLIA]) VALUES (5, N'ΠΕΤΡΟΥ ΑΕ', N'ΠΕΤΡΟΥ ΑΕ', N'ΝΙΚΟΣ', CAST(0x00005E0C00000000 AS DateTime), 51, N'000000443892', N'ΘΕΣΣΑΛΟΝΙΚΗΣ', N'ΕΓΝΑΤΙΑΣ 256', N'ΘΕΣΣΑΛΟΝΙΚΗ', N'2310554998', NULL, NULL)
INSERT [dbo].[PELATIS] ([KOD_PELATI], [EPONIMIA], [EPITHETO], [ONOMA], [IM_GENISIS], [ILIKIA], [AFM], [DOI], [DIEUTHINSI], [POLI], [TIL], [FOTO], [SXOLIA]) VALUES (10, NULL, NULL, NULL, CAST(0x000087C800000000 AS DateTime), 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[PELATIS] ([KOD_PELATI], [EPONIMIA], [EPITHETO], [ONOMA], [IM_GENISIS], [ILIKIA], [AFM], [DOI], [DIEUTHINSI], [POLI], [TIL], [FOTO], [SXOLIA]) VALUES (11, NULL, NULL, NULL, CAST(0x000088D900000000 AS DateTime), 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL)
SET IDENTITY_INSERT [dbo].[PELATIS] OFF
INSERT [dbo].[PROIONTA_PARAGELIAS] ([K_PAR], [K_E], [POSOTITA]) VALUES (1, 1, 100)
INSERT [dbo].[PROIONTA_PARAGELIAS] ([K_PAR], [K_E], [POSOTITA]) VALUES (2, 3, 200)
INSERT [dbo].[PROIONTA_PARAGELIAS] ([K_PAR], [K_E], [POSOTITA]) VALUES (3, 4, 25)
INSERT [dbo].[PROIONTA_PARAGELIAS] ([K_PAR], [K_E], [POSOTITA]) VALUES (4, 2, 20)
INSERT [dbo].[PROIONTA_PARAGELIAS] ([K_PAR], [K_E], [POSOTITA]) VALUES (5, 7, 2)
INSERT [dbo].[PROIONTA_PARAGELIAS] ([K_PAR], [K_E], [POSOTITA]) VALUES (6, 6, 2)
INSERT [dbo].[PROIONTA_PARAGELIAS] ([K_PAR], [K_E], [POSOTITA]) VALUES (7, 1, 15)
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_PARAGELIA_PELATHS]') AND parent_object_id = OBJECT_ID(N'[dbo].[PARAGELIA]'))
ALTER TABLE [dbo].[PARAGELIA]  WITH CHECK ADD  CONSTRAINT [FK_PARAGELIA_PELATHS] FOREIGN KEY([K_PEL])
REFERENCES [dbo].[PELATIS] ([KOD_PELATI])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_PARAGELIA_PELATHS]') AND parent_object_id = OBJECT_ID(N'[dbo].[PARAGELIA]'))
ALTER TABLE [dbo].[PARAGELIA] CHECK CONSTRAINT [FK_PARAGELIA_PELATHS]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_PROIONTA_PARAGELIAS_APOTHIKI]') AND parent_object_id = OBJECT_ID(N'[dbo].[PROIONTA_PARAGELIAS]'))
ALTER TABLE [dbo].[PROIONTA_PARAGELIAS]  WITH CHECK ADD  CONSTRAINT [FK_PROIONTA_PARAGELIAS_APOTHIKI] FOREIGN KEY([K_E])
REFERENCES [dbo].[APOTHIKI] ([KE])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_PROIONTA_PARAGELIAS_APOTHIKI]') AND parent_object_id = OBJECT_ID(N'[dbo].[PROIONTA_PARAGELIAS]'))
ALTER TABLE [dbo].[PROIONTA_PARAGELIAS] CHECK CONSTRAINT [FK_PROIONTA_PARAGELIAS_APOTHIKI]
GO
IF NOT EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_PROIONTA_PARAGELIAS_PARAGELIA]') AND parent_object_id = OBJECT_ID(N'[dbo].[PROIONTA_PARAGELIAS]'))
ALTER TABLE [dbo].[PROIONTA_PARAGELIAS]  WITH CHECK ADD  CONSTRAINT [FK_PROIONTA_PARAGELIAS_PARAGELIA] FOREIGN KEY([K_PAR])
REFERENCES [dbo].[PARAGELIA] ([KOD_PAR])
GO
IF  EXISTS (SELECT * FROM sys.foreign_keys WHERE object_id = OBJECT_ID(N'[dbo].[FK_PROIONTA_PARAGELIAS_PARAGELIA]') AND parent_object_id = OBJECT_ID(N'[dbo].[PROIONTA_PARAGELIAS]'))
ALTER TABLE [dbo].[PROIONTA_PARAGELIAS] CHECK CONSTRAINT [FK_PROIONTA_PARAGELIAS_PARAGELIA]
GO
/****** Object:  Trigger [dbo].[ILIKIA]    Script Date: 5/28/2016 3:53:00 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
IF NOT EXISTS (SELECT * FROM sys.triggers WHERE object_id = OBJECT_ID(N'[dbo].[ILIKIA]'))
EXEC dbo.sp_executesql @statement = N'CREATE TRIGGER [dbo].[ILIKIA] ON [dbo].[PELATIS]
FOR INSERT, UPDATE, DELETE
AS
BEGIN
UPDATE PELATIS SET ILIKIA = DATEDIFF ( YEAR , IM_GENISIS , GETDATE() )
END
' 
GO
IF NOT EXISTS (SELECT * FROM ::fn_listextendedproperty(N'SQL_Greek_General_CP1_CI_AS' , NULL,NULL, NULL,NULL, NULL,NULL))
EXEC [APOTHIKI3748].sys.sp_addextendedproperty @name=N'SQL_Greek_General_CP1_CI_AS', @value=N'' 
GO
USE [master]
GO
ALTER DATABASE [APOTHIKI3748] SET  READ_WRITE 
GO
