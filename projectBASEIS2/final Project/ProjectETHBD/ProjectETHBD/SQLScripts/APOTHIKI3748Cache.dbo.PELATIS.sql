IF NOT EXISTS (SELECT * FROM sys.change_tracking_tables WHERE object_id = OBJECT_ID(N'[dbo].[PELATIS]')) 
   ALTER TABLE [dbo].[PELATIS] 
   ENABLE  CHANGE_TRACKING
GO
