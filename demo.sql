USE [demo]
GO
/****** Object:  Table [dbo].[AdresBlackList]    Script Date: 12.11.2020 11:51:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[AdresBlackList](
	[ID] [int] IDENTITY(1,1) NOT NULL,
	[Hostname] [nvarchar](50) NULL,
	[MailAdresi] [varchar](100) NULL,
	[EklenmeTarihi] [datetime] NULL,
	[DuzenlenmeTarihi] [datetime] NULL,
	[Ekleyen] [int] NULL,
	[Duzenleyen] [int] NULL,
	[Silindi] [bit] NULL,
	[Silen] [int] NULL,
 CONSTRAINT [PK_AdresBlackList] PRIMARY KEY CLUSTERED 
(
	[ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[AdresWhiteList]    Script Date: 12.11.2020 11:51:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[AdresWhiteList](
	[ID] [int] IDENTITY(1,1) NOT NULL,
	[Hostname] [nvarchar](50) NULL,
	[MailAdresi] [varchar](100) NULL,
	[EklenmeTarihi] [datetime] NULL,
	[DuzenlenmeTarihi] [datetime] NULL,
	[Ekleyen] [int] NULL,
	[Duzenleyen] [int] NULL,
	[Silindi] [bit] NULL,
	[Silen] [int] NULL,
 CONSTRAINT [PK_AdresWhiteList] PRIMARY KEY CLUSTERED 
(
	[ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[BadWords]    Script Date: 12.11.2020 11:51:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[BadWords](
	[ID] [int] NOT NULL,
	[Kelime] [nvarchar](50) NULL,
	[EklenmeTarihi] [datetime] NULL,
	[DuzenlenmeTarihi] [datetime] NULL,
	[Ekleyen] [int] NULL,
	[Duzenleyen] [int] NULL,
	[Silindi] [bit] NULL,
	[Silen] [int] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[BlackList]    Script Date: 12.11.2020 11:51:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[BlackList](
	[ID] [int] IDENTITY(1,1) NOT NULL,
	[Hostname] [nvarchar](50) NULL,
	[IPTuru] [nvarchar](50) NULL,
	[IPAdresi] [varchar](50) NULL,
	[KurumID] [int] NULL,
	[EklenmeTarihi] [datetime] NULL,
	[DuzenlenmeTarihi] [datetime] NULL,
	[Ekleyen] [int] NULL,
	[Duzenleyen] [int] NULL,
	[Silindi] [bit] NULL,
	[Silen] [int] NULL,
 CONSTRAINT [PK_BlackList] PRIMARY KEY CLUSTERED 
(
	[ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[DomainExtension]    Script Date: 12.11.2020 11:51:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[DomainExtension](
	[ID] [int] IDENTITY(1,1) NOT NULL,
	[Kelime] [nvarchar](50) NULL,
	[EklenmeTarihi] [datetime] NULL,
	[DuzenlenmeTarihi] [datetime] NULL,
	[Ekleyen] [int] NULL,
	[Duzenleyen] [int] NULL,
	[Silindi] [bit] NULL,
	[Silen] [int] NULL,
 CONSTRAINT [PK_DomainExtension] PRIMARY KEY CLUSTERED 
(
	[ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Kullanicilar]    Script Date: 12.11.2020 11:51:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Kullanicilar](
	[ID] [int] IDENTITY(1,1) NOT NULL,
	[Ad] [nvarchar](50) NULL,
	[Soyad] [nvarchar](50) NULL,
 CONSTRAINT [PK_Kullanicilar] PRIMARY KEY CLUSTERED 
(
	[ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Kurumlar]    Script Date: 12.11.2020 11:51:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Kurumlar](
	[ID] [int] IDENTITY(1,1) NOT NULL,
	[KTID] [int] NULL,
	[KID] [int] NULL,
	[KurumAdi] [nvarchar](250) NULL,
	[Domain] [nvarchar](250) NULL,
	[EklenmeTarihi] [datetime] NULL,
	[DuzenlemeTarihi] [datetime] NULL,
	[Ekleyen] [int] NULL,
	[Duzenleyen] [int] NULL,
	[Silindi] [bit] NULL,
	[Silen] [int] NULL,
 CONSTRAINT [PK_Kurumlar] PRIMARY KEY CLUSTERED 
(
	[ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[KurumTürleri]    Script Date: 12.11.2020 11:51:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[KurumTürleri](
	[ID] [int] IDENTITY(1,1) NOT NULL,
	[Adi] [nvarchar](250) NULL,
	[EklenmeTarihi] [datetime] NULL,
	[DuzenlemeTarihi] [datetime] NULL,
	[Ekleyen] [int] NULL,
	[Duzenleyen] [int] NULL,
	[Silindi] [bit] NULL,
	[Silen] [int] NULL,
 CONSTRAINT [PK_KurumTürleri] PRIMARY KEY CLUSTERED 
(
	[ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[WhiteList]    Script Date: 12.11.2020 11:51:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[WhiteList](
	[ID] [int] IDENTITY(1,1) NOT NULL,
	[Hostname] [nvarchar](50) NULL,
	[IPTuru] [nvarchar](50) NULL,
	[IPAdresi] [varchar](50) NULL,
	[KurumID] [int] NULL,
	[EklenmeTarhihi] [datetime] NULL,
	[DuzenlenmeTarihi] [datetime] NULL,
	[Ekleyen] [int] NULL,
	[Duzenleyen] [int] NULL,
	[Silindi] [bit] NULL,
	[Silen] [int] NULL,
 CONSTRAINT [PK_WhiteList] PRIMARY KEY CLUSTERED 
(
	[ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[YerSaglayicilari]    Script Date: 12.11.2020 11:51:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[YerSaglayicilari](
	[ID] [int] IDENTITY(1,1) NOT NULL,
	[YersaglayiciAdi] [nvarchar](250) NOT NULL,
	[EklenmeTarhihi] [datetime] NULL,
	[DuzenlenmeTarihi] [datetime] NULL,
	[Ekleyen] [int] NULL,
	[Duzenleyen] [int] NULL,
	[Silindi] [bit] NULL,
	[Silen] [int] NULL,
 CONSTRAINT [PK_YerSaglayicilari] PRIMARY KEY CLUSTERED 
(
	[ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[Kullanicilar] ON 

INSERT [dbo].[Kullanicilar] ([ID], [Ad], [Soyad]) VALUES (1, N'Burcu', N'Fırat')
SET IDENTITY_INSERT [dbo].[Kullanicilar] OFF
GO
SET IDENTITY_INSERT [dbo].[Kurumlar] ON 

INSERT [dbo].[Kurumlar] ([ID], [KTID], [KID], [KurumAdi], [Domain], [EklenmeTarihi], [DuzenlemeTarihi], [Ekleyen], [Duzenleyen], [Silindi], [Silen]) VALUES (1, NULL, 1, N'Turk Tülekeom', N'sabahweb.com', CAST(N'2020-11-03T17:19:57.017' AS DateTime), NULL, 1, NULL, 0, NULL)
SET IDENTITY_INSERT [dbo].[Kurumlar] OFF
GO
SET IDENTITY_INSERT [dbo].[KurumTürleri] ON 

INSERT [dbo].[KurumTürleri] ([ID], [Adi], [EklenmeTarihi], [DuzenlemeTarihi], [Ekleyen], [Duzenleyen], [Silindi], [Silen]) VALUES (1, N'Devletkurumlar', CAST(N'2020-11-03T17:27:45.253' AS DateTime), NULL, 1, NULL, 0, NULL)
SET IDENTITY_INSERT [dbo].[KurumTürleri] OFF
GO
SET IDENTITY_INSERT [dbo].[YerSaglayicilari] ON 

INSERT [dbo].[YerSaglayicilari] ([ID], [YersaglayiciAdi], [EklenmeTarhihi], [DuzenlenmeTarihi], [Ekleyen], [Duzenleyen], [Silindi], [Silen]) VALUES (1, N'Özel Şirketler', CAST(N'2020-11-03T17:38:20.287' AS DateTime), NULL, NULL, NULL, 0, NULL)
SET IDENTITY_INSERT [dbo].[YerSaglayicilari] OFF
GO
ALTER TABLE [dbo].[AdresBlackList] ADD  CONSTRAINT [DF_Table_1_EklenmeTarhihi]  DEFAULT (getdate()) FOR [EklenmeTarihi]
GO
ALTER TABLE [dbo].[AdresBlackList] ADD  CONSTRAINT [DF_AdresBlackList_Silindi]  DEFAULT ((0)) FOR [Silindi]
GO
ALTER TABLE [dbo].[AdresWhiteList] ADD  CONSTRAINT [DF_AdresWhiteList_EklenmeTarihi]  DEFAULT (getdate()) FOR [EklenmeTarihi]
GO
ALTER TABLE [dbo].[AdresWhiteList] ADD  CONSTRAINT [DF_AdresWhiteList_Silindi]  DEFAULT ((0)) FOR [Silindi]
GO
ALTER TABLE [dbo].[BadWords] ADD  CONSTRAINT [DF_BadWords_EklenmeTarihi]  DEFAULT (getdate()) FOR [EklenmeTarihi]
GO
ALTER TABLE [dbo].[BadWords] ADD  CONSTRAINT [DF_BadWords_Silindi]  DEFAULT ((0)) FOR [Silindi]
GO
ALTER TABLE [dbo].[BlackList] ADD  CONSTRAINT [DF_BlackList_EklenmeTarhihi]  DEFAULT (getdate()) FOR [EklenmeTarihi]
GO
ALTER TABLE [dbo].[BlackList] ADD  CONSTRAINT [DF_BlackList_Silindi]  DEFAULT ((0)) FOR [Silindi]
GO
ALTER TABLE [dbo].[DomainExtension] ADD  CONSTRAINT [DF_DomainExtension_EklenmeTarihi]  DEFAULT (getdate()) FOR [EklenmeTarihi]
GO
ALTER TABLE [dbo].[DomainExtension] ADD  CONSTRAINT [DF_DomainExtension_Silindi]  DEFAULT ((0)) FOR [Silindi]
GO
ALTER TABLE [dbo].[Kurumlar] ADD  CONSTRAINT [DF_Kurumlar_EklenmeTarihi]  DEFAULT (getdate()) FOR [EklenmeTarihi]
GO
ALTER TABLE [dbo].[Kurumlar] ADD  CONSTRAINT [DF_Kurumlar_Silindi]  DEFAULT ((0)) FOR [Silindi]
GO
ALTER TABLE [dbo].[KurumTürleri] ADD  CONSTRAINT [DF_KurumTürleri_EklenmeTarihi]  DEFAULT (getdate()) FOR [EklenmeTarihi]
GO
ALTER TABLE [dbo].[KurumTürleri] ADD  CONSTRAINT [DF_KurumTürleri_Silindi]  DEFAULT ((0)) FOR [Silindi]
GO
ALTER TABLE [dbo].[WhiteList] ADD  CONSTRAINT [DF_WhiteList_EklenmeTarhihi]  DEFAULT (getdate()) FOR [EklenmeTarhihi]
GO
ALTER TABLE [dbo].[WhiteList] ADD  CONSTRAINT [DF_WhiteList_Silindi]  DEFAULT ((0)) FOR [Silindi]
GO
ALTER TABLE [dbo].[YerSaglayicilari] ADD  CONSTRAINT [DF_YerSaglayicilari_EklenmeTarhihi]  DEFAULT (getdate()) FOR [EklenmeTarhihi]
GO
ALTER TABLE [dbo].[YerSaglayicilari] ADD  CONSTRAINT [DF_YerSaglayicilari_Silindi]  DEFAULT ((0)) FOR [Silindi]
GO
